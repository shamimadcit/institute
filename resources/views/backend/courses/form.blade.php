@extends('backend.master')

@section('title', isset($course) ? 'Edit' : 'Create'." ".'course')

@section('body')
    <div class="row py-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($course) ? 'Edit' : 'Create' }} course</h3>
                    <a href="{{ route('courses.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($course))
                            @method('put')
                        @endif

                        <div class="row mt-4">
                            <label for="" class="col-md-3">Title</label>
                           
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ isset($course) ? $course->title: '' }}" />
                            </div>
                            
                        </div>

                        <div class="row mt-4">
                            <label for="" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control" accept="image/*" id="imagez" />
                                @if(isset($course))
                                    <img src="{{ asset($course->image) }}" alt="" style="height: 80px" />
                                @endif
                            </div>
                            
                        </div>

                        <div class="row mt-4">
                            <label for="" class="col-md-3">Short Description</label>
                           
                            <div class="col-md-9">
                                <input type="text" name="short_description" class="form-control" placeholder="Short Description" value="{{ isset($course) ? $course->short_description: '' }}" />
                            </div>
                            
                        </div>

                        <div class="row mt-4">
                            <label for="" class="col-md-3">Long Description</label>
                            <div class="col-md-9">
                                <textarea name="long_description" id="" class="form-control ckeditor" placeholder=" long description">{{ isset($service) ? $service->long_description : '' }}</textarea>
                            </div>
                            
                        </div>
                       
                        <div class="row mt-4">
                            <label for="" class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($course) && $course->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($course) ? 'Update' : 'Create' }} course ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush


