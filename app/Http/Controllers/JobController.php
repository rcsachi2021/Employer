<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Job;

class JobController extends Controller
{
    public function jobList()
    {
       $empID  = auth()->guard('employer')->user()->id;
       $jobs = Job::where('emp_id',$empID)->latest()->paginate(5);
       return view('job.joblist', compact('jobs')); 
    }

    public function addJob()
    {
        return view('job.addjob');
    }

    public function saveJob(Request $request)
    {
        $fromDate = $request->from_date;
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,bmp,png',
            'job_name' => 'required',
            'emirates' => 'required',
            'company_name' => 'required',
            'from_date' => 'required|date_format:Y-m-d',
            'till_date' => 'required|date_format:Y-m-d|after:'.$fromDate,
            'email_to' => 'required',
            'location' => 'required',
            'job_type' => 'required',
        ]);

        $input = [
            'job_name' => $request->job_name,
            'emp_id' => auth()->guard('employer')->user()->id,
            'emirates' => $request->emirates,
            'company_name' => $request->company_name,
            'from_date' => $request->from_date,
            'till_date' => $request->till_date,
            'email_to' => $request->email_to,
            'location' => $request->location,
            'job_type' => $request->job_type,
        ];       
        $jobImage = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext  = strtolower($jobImage->getClientOriginalExtension());
        $image_name = $name_gen.'.'.$img_ext;
        $uplocation = 'image/job/';
        $last_image = $uplocation.$image_name;
        $jobImage -> move($uplocation,$image_name);
        $input['image'] = $last_image;

        $job = Job::create($input);
        if($job)
        {
            return redirect()->route('joblist')->with('message', 'Job added successfully');
        }
        else{
            return redirect()->route('joblist')->with('message', 'Soemthing wrong');
        }
    }

    public function deleteJob($jobID)
    {
        $job = Job::find(decrypt($jobID));
        $job -> delete();
        return redirect()->back()->with('message', 'Job Deleted Successfully');
    }

    public function viewJob($jobID)
    {
        $job = Job::find(decrypt($jobID));
        //return $job;
        return view('job.viewjob',compact('job'));
    }
}
