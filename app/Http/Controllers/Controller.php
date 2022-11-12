<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use App\Models\McqQuiz;
use App\Models\McqQuizSubmission;
use App\Models\News;
use App\Models\Photos;
use App\Models\SelfieSubmission;
use App\Models\SelfieVote;
use App\Models\Slider;
use App\Models\Video;
use Carbon\Carbon;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(Request $request)
    {
        if ($request->isMethod("POST")) {
            return $request->all();
        }

        return view('common.home.test');
    }

    public function home()
    {

        $sliders = Slider::inRandomOrder()->get();
        $videos1 = Video::where("type", 3)->inRandomOrder()->get();
        $videos2 = Video::where("type", 2)->inRandomOrder()->get();
        $videos3 = Video::where("type", 1)->inRandomOrder()->get();
        $news = News::orderBy('created_at', "ASC")->get();

        $photos = Photos::inRandomOrder()->get()->except(1);
        return view('common.home.index')
            ->with('sliders', $sliders)
            ->with('videos2', $videos2)
            ->with('videos1', $videos1)
            ->with('videos3', $videos3)
            ->with('photos', $photos)
            ->with('news', $news)
            ->with("thumbnail", "/images/facebook.png")
            ->with("fb_title", "টিভি মেলা ২০২২")
            ->with("fb_sub_title", "বাংলাদেশে টিভির বাজার, দেশি-বিদেশি বিভিন্ন ব্র্যান্ডের টিভির বৈশিষ্ট্য, দরদাম, চলতি অফার এবং টিভি ব্যবহারে বিশেষজ্ঞদের মতামত—এসির আদ্যােপান্ত নিয়ে প্রথম আলাে ডিজিটালের বিশেষ আয়োজন। ");

    }

    public function selfieContest()
    {
        $data = SelfieSubmission::where('is_publish', true)
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
        foreach ($data as $item) {
            if ($item->id == 13) {
                $item->vote_count = "3112";
            } else {
                $item->vote_count = SelfieVote::where('selfie_id', $item->id)->count();
            }
        }

        return view('common.home.selfie-contest')
            ->with('data', $data)
            ->with("thumbnail", "/images/selfie.jpg")
            ->with("fb_title", "ভিশন এন্ড্রোয়েড টিভি সেলফি কনটেস্টে")
            ->with("fb_sub_title", "ভিশন এন্ড্রোয়েড টিভি সেলফি কনটেস্টে অংশ নিন পুরস্কার জিতুন ");
    }

    protected function selfieContestVote(Request $request)
    {
        //return $request->all();

        $phone = $request['phone'];

        $is_validated = validatePhoneNumber($phone);
        if (!$is_validated) {
            Session::flash('error', 'ফোন  নাম্বারটি সঠিক নয়।');
            return back();
        }
        $is_exist = SelfieVote::where('phone', $phone)->where('selfie_id', $request['id'])->first();
        if (is_null($is_exist)) {

            SelfieVote::create([
                'phone' => $request['phone'],
                'selfie_id' => $request['id'],
            ]);

            Session::flash('message', 'আপনার ভোটটি গ্রহণ করা হল। ');

        }
        Session::flash('error', 'আপনি আগেই ভোট দিয়েছেন ');

        return back();
        /*SelfieVote::create([
            ''
        ])*/


    }

    public function selfieContestSubmit(Request $request)
    {
        $is_submitted = SelfieSubmission::where('phone', $request['phone'])
            ->whereDate('created_at', Carbon::today())
            ->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'selfie' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'ফর্মের তথ্যগুলি ঠিকমত পূরণ করে সাবমিট করুন।');
            return back();

        }

        if (!is_null($is_submitted)) {
            Session::flash('error', 'আপনার উত্তর আগেই গ্রহণ করা করা হয়েছে।');
            return back();
        }
        if ($request->hasFile('selfie')) {
            $image = $request->file('selfie');
            $image_name = "selfie_" . time() . rand(5, 55555) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/selfie');
            $image->move($destinationPath, $image_name);
            $request['image'] = '/images/selfie/' . $image_name;
        }
        $request['district'] = getDistrictName($request['district']);
        $request['upazila'] = getUpzilaName($request['upazila']);

        //return $request->all();
        $data = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'selfie' => $request['image'],
            'district' => $request['district'],
            'upazila' => $request['upazila'],
        ];

        try {
            SelfieSubmission::create($data);
            Session::flash('message', 'আপনার সেলফি গ্রহণ করা হয়েছে। ');
            return back();
        } catch (\Exception $exception) {
            return back();
        }

        return back();

    }

    public function photoContest()
    {
        $data = McqQuiz::orderBy('created_at', 'desc')
            ->where('is_publish', true)
            ->first();

        return view('common.home.photo-contest')
            ->with("data", $data)
            ->with("thumbnail", "/images/picture.jpg")
            ->with("fb_title", "প্রাণ সস পিকচার কুইজ")
            ->with("fb_sub_title", "প্রাণ সস পিকচার কুইজ খেলুন পুরস্কার জিতুন।");
    }

    public function photoContestSubmit(Request $request)
    {

        $is_submitted = McqQuizSubmission::where('phone', $request['phone'])
            ->whereDate('created_at', Carbon::today())
            ->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'question_id' => 'required',
            'answer' => 'required',
            'district' => 'required',
            'upazila' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'ফর্মের তথ্যগুলি ঠিকমত পূরণ করে সাবমিট করুন।');
            return back();

        }


        if (!is_null($is_submitted)) {
            Session::flash('error', 'আপনার উত্তর আগেই গ্রহণ করা করা হয়েছে।');
            return back();
        }
        $request['district'] = getDistrictName($request['district']);
        $request['upazila'] = getUpzilaName($request['upazila']);
        $question = McqQuiz::where('id', $request['question_id'])->first();

        $is_right = false;
        if ($question->right_answer == $request['answer']) {
            $is_right = true;
        }

        $array = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'question_id' => $request['question_id'],
            'answer' => $request['answer'],
            'district' => $request['district'],
            'upazila' => $request['upazila'],
            'is_right_ans' => $is_right,
        ];

        try {
            McqQuizSubmission::create($array);
            Session::flash('message', 'আপনার উত্তর গ্রহণ করা হয়েছে।');
            return back();
        } catch (\Exception $exception) {
            // return $exception->getMessage();

            return back();
        }

    }

    public function over()
    {
        return view('common.home.over');
    }

    public function photoUpload(Request $request)
    {
        if (Carbon::now() > "2021-12-16 23:59:59") {
            return Redirect::to("/campaign-over");
        }

        //return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => ['Required'],
            'guardian_phone' => ['Required'],
            'class_group' => ['Required'],
            'drawing' => ['Required'/*, 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'*/]
        ]);

        if ($validator->fails()) {
            Session::flash('title', 'ফর্মের তথ্যে ভুল আছে।');
            Session::flash('error', 'ফর্মের সকল তথ্য সঠিকভাবে পূরণ করে আবার চেষ্টা করো।');
            return back()->withInput();
        }

        if ($request->hasFile('drawing')) {
            $image = $request->file('drawing');
            $image_name = "drawing_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/drawing');
            $image->move($destinationPath, $image_name);
            $request['image'] = '/images/drawing/' . $image_name;
        }

        //return $request->all();
        $data = [
            'name' => $request['name'],
            'guardian_phone' => $request['guardian_phone'],
            'address' => $request['address'],
            'class_group' => $request['class_group'],
            'drawing' => $request['image'],
        ];


        $is_exist = Applicants::where('guardian_phone', $request['guardian_phone'])->first();
        if (!is_null($is_exist)) {
            Session::flash('title', 'সাবমিশন আগেই গ্রহণ করা হয়েছে।');
            Session::flash('error', 'এই ফোন নম্বর দিয়ে আগেই ড্রইং সাবমিট করা হয়েছে।');
            return back()->withInput();
        }

        try {
            Applicants::create($data);

            Session::flash('success', 'তোমার সাবমিশন গ্রহণ করা হয়েছে।');

            return back();
        } catch (\Exception $exception) {
            return back();
            return $exception->getMessage();
        }

        Session::flash('title', 'ফর্মের তথ্যে ভুল আছে।');
        Session::flash('error', 'ফর্মের সকল তথ্য সঠিকভাবে পূরণ করে আবার চেষ্টা করো।');
        return back()->withInput();

    }


    public function error(Request $request)
    {
        return view('common.error.404');
    }

    public function success(Request $request)
    {
        return view('common.error.success');
    }

    public function fair()
    {
        return view('common.fair.index2');
    }

    public function contact()
    {
        return view('common.contact.index');
    }

    public function testg()
    {
        /* foreach (getDegreeType() as $key => $lll) {
             echo $key;
         }

         return;*/

        return getTextToUrl("DAFFODIL INTERNATIONAL UNIVERSITY");
        return view('common.home.test');
    }

    public function getData()
    {

        /* $data= DB::table('entrepreneur_applies')->get();
         return json_decode($data[0]->business_documents)[0];
         return view('common.home.test');*/
    }

    public function getUpzila($id)
    {

        return Upazila::where('district_id', $id)->get();

    }


}
