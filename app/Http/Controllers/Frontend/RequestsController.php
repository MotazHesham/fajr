<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobresquestRequest;
use App\Http\Requests\StoreQuotationRequestRequest;
use App\Models\QuotationRequest;
use App\Models\Jobresquest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\Models\Media;
use Alert;

class RequestsController extends Controller
{
    //

    use MediaUploadingTrait;
    
    public function JobRequest(StoreJobresquestRequest $request)
    {
        $jobresquest = Jobresquest::create($request->all());

        if ($request->input('cv', false)) {
            $jobresquest->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $jobresquest->id]);
        }

        Alert::success('تم ارسال الطلب بنجاح','سيتم التواصل معك قريبا');  
    return redirect()->route('frontend.home');
}
    public function PriceRequest(StoreQuotationRequestRequest $request)
{
      $quotationRequest = QuotationRequest::create($request->all());
   
      Alert::success('تم ارسال الطلب بنجاح','سيتم التواصل معك قريبا');  
      return redirect()->route('frontend.home');
}
public function storeCKEditorImages(Request $request)
{
    abort_if(Gate::denies('jobresquest_create') && Gate::denies('jobresquest_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $model         = new Jobresquest();
    $model->id     = $request->input('crud_id', 0);
    $model->exists = true;
    $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

    return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
}
}