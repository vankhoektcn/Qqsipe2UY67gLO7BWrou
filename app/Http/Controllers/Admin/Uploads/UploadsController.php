<?php

namespace App\Http\Controllers\Admin\Uploads;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Attachment;
use App\Common;
use DB;
use Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UploadsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$controlname = $request->get('name');

		 // getting all of the post data
		$file = array($controlname => $request->file($controlname));
		// setting up rules
		$rules = array('image' => 'mimes:jpg,jpeg,gif,png,pdf,rar,zip,7z,doc,docx,xls,xlsx,txt|max:5120');
		// doing the validation, passing post data, rules and the messages
		$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
			// send back to the page with the input data and errors
			return $results = [
						'error' => $validator->messages()->toArray()
					];
		}
		else {
			if ($request->hasFile($controlname)) {
				// checking file is valid.
				if ($request->file($controlname)->isValid()) {
					$destinationPath = 'uploads'; // upload path
					$filename = substr($request->file($controlname)->getClientOriginalName(), 0,strripos($request->file($controlname)->getClientOriginalName(), '.'));
					$filename = Common::createKeyURL($filename);
					$extension = $request->file($controlname)->getClientOriginalExtension(); // getting image extension
					$date = new \DateTime();
					$filename = $filename.'-'.$date->getTimestamp().'.'.$extension; // renameing image
					$request->file($controlname)->move($destinationPath, $filename); // uploading file to given path
					
					if ($controlname != 'editorfile') {
						//$filename = str_replace('.','-image(160x80-crop).', $filename);
						$results = [
							'initialPreview' => ['<img src="/' .$destinationPath.'/'.$filename. '" class="file-preview-image">',]
						];
					}
					else
						$results = '/' .$destinationPath.'/'.$filename;

					return $results;
				}
				else {
					// sending back with error message.
					return $results = [
						'error' => 'Lỗi trong quá trình upload.'
					];
				}
			}
			else{
				return $results = [
						'error' => 'Không nhận được dữ liệu.['.$controlname.']'
					];
			}
		}
	}

	public function destroy(Request $request)
	{		
		$attachmentId = $request->get('key');
		$filePath = $request->get('path');
		if( isset($attachmentId) && $attachmentId != "0" )
		{
			DB::transaction(function () use ($attachmentId) {
				$user = Auth::user();
				$attachment = Attachment::findOrFail($attachmentId);
				$attachment->updated_by = $user->name;
				$attachment->deleted_by = $user->name;
				$attachment->save();

				$filePath = $attachment->path;
				// soft delete
				$attachment->delete();
			});
		}
		if(!is_null($filePath) )// && File::exists(base_path().$filePath))
		{
			Storage::disk('image')->delete(str_replace('/uploads/', '', $filePath));
		}

	}
}
