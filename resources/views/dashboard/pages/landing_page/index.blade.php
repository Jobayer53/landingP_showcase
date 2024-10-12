@extends('dashboard.layouts.app')
@section('title')  @endsection
@section('style')
<style>
    .test-report, .prescription{
        display: none;
    }
    .active {
        display: block;
    }
    .masonry {
        column-count: 3;
        column-gap: 1rem;
    }
    .item {
        break-inside: avoid;
    }
    .icons{
        position: absolute;
        margin-top: -39px;
    }
   .icons a {
        display: inline-block;
        margin: 0 10px;
        color: #fff; /* White color for the icons */
        font-size: 11px; /* Icon size */
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        padding: 7px;
        border-radius: 50%;
    }
    .icons a:hover{
        color: red;
    }
</style>
@endsection
@section('content')
<div class="page-titles">
    <h4>Landing Page</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Landing Page</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
       <div class="card">
        <div class="card-header m-auto">
            <h4 class="">Landing Page</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('landing-page.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Header</label>
                    <input type="text" class="form-control" name="header" id="" placeholder="Header" value="{{ $landing->header }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_desc" id="" cols="30" rows="7" placeholder="">{{ $landing->short_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quote One</label>
                    <input type="text" class="form-control" name="quote_one" id="" placeholder="Quote" value="{{ $landing->quote_one }}">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="form-label me-4">Video Link: </label>
                            <div class="form-check d-inline-block">
                                <input checked  class=" yt form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                 Youtube Video
                                </label>
                            </div>
                            <div class="form-check d-inline-block mx-2">
                                <input  class="upload form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                 Upload
                                </label>
                            </div>
                            <input id="yt_input" type="text" class="form-control" name="yt_link" id="" placeholder="  <iframe class='w-full aspect-square rounded-md'  src='https://www.youtube.com/embed/jEQoEKMZ7Qc?si=slkFXIlIjzXnb6La' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen>" value="{{ $landing->youtube_link }}">

                            <input id="upload_input" type="file" class="d-none form-control" name="uploaded_video" accept="video/mp4">
                            @if($landing->video )
                            <video  class="mt-3"  width="90%" height="auto" controls >
                                <source >
                                    <source src="{{ public_path('uploads/landing/'.$landing->video) }}" type="video/mp4">
                                        <source src="{{ public_path('uploads/landing/'.$landing->video) }}" type="video/ogg">
                            </video>
                            @endif
                            @if($landing->youtube_link )
                            <div class="mt-3">

                                {!!  $landing->youtube_link !!}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label me-4">Image </label>

                            <input  type="file" class=" upload form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="" class="form-label mt-2"> Current Image:</label> <br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="form-label mt-2"> Preview:</label> <br>
                                    <img class="d-none" id="blah" alt="Uploaded image" width="100%" height="auto" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quote Two</label>
                    <input type="text" class="form-control" name="quote_two" id="" placeholder="Quote">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> Image (customer feedback)</label>
                    <input  type="file" class=" upload2 form-control" name="feedback_image" id="" placeholder="" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])" >
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="" class="form-label mt-2"> Preview:</label>
                            <img class="d-none" id="blah2" alt="Uploaded image" width="100%" height="auto" />
                        </div>
                        <div class="col-lg-9">
                            <label for="" class="form-label mt-2"> Images: </label>
                            <div class="masonry">
                                <div class="item mb-4    ">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqGK3diR3Zi-mnOXEaj-3ewmFyRYVxGzVzZw&s" class="img-fluid rounded shadow-sm " alt="Prescription Image">
                                    <div class="icons">
                                        <a href=""class=" " title="Delete"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
               <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label"> Benefit Title</label>
                            <input type="text" class="form-control" name="benefit_header" id="" placeholder=" Benefit Title line" >
                        </div>
                        <div  class="mb-3">
                            <label for="" class="form-label">Benefits List</label>
                            <input type="text" class="form-control" name="benefit_list[]" id="" placeholder=" Benefits list">
                        </div>
                        <div id="benefit" class=""></div>
                        <div class="mb-3">
                            <span id="add-benefit" class="btn btn-primary btn-sm float-end">Add</span>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="    ">
                            <label for="" class="form-label me-4">Benefit Image </label>
                            <input  type="file" class=" upload3 form-control" name="benefit_image" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="" class="form-label mt-2"> Current Image:</label> <br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="form-label mt-2"> Preview:</label> <br>
                                    <img class="d-none" id="blah3" alt="Uploaded image" width="100%" height="auto" />
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="mb-3">
                    <label for="" class="form-label me-4">Uses Title </label>
                    <input  type="text" class=" form-control" name="uses_title" >
                </div>
               <div class="mb-3">
                    <label for="" class="form-label me-4">Uses  </label>
                   <textarea class="form-control" name="uses" id="" cols="30" rows="7" placeholder="Uses"></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Product Image</label>
                            <input type="file" class=" upload4 form-control" name="product_image" id="" placeholder="" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="" class="form-label mt-2"> Current Image:</label> <br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="form-label mt-2"> Preview:</label> <br>
                                    <img class="d-none" id="blah4" alt="Uploaded image" width="100%" height="auto" />
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="" placeholder="Product Name" >
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Product Price</label>
                            <input type="number" class="form-control" name="product_price" id="" placeholder="Product Price" >
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-5 text-center">
                    <button class="btn btn-primary " >Add</button>
                </div>
            </form>
        </div>
       </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <script>
        $(document).ready(function() {
            //side bar off
            $('.hamburger').click();
            // upload video or link
            $('.yt').on('click', function() {
                $('#yt_input').removeClass('d-none');
                $('#yt_input').attr('disabled', false);
                $('#upload_input').addClass('d-none');
                $('#upload_input').attr('disabled', true);
                $('.video').addClass('d-none');
            });
            $('.upload').on('click', function() {
                $('#upload_input').removeClass('d-none');
                $('#upload_input').attr('disabled', false);
                $('.video').removeClass('d-none');
                $('#yt_input').addClass('d-none');
                $('#yt_input').attr('disabled', true);
            });
            // add benefits list
            $('#add-benefit').on('click', function() {
                let benefit = $('#benefit');
                let data = `<div class="benefit-list mb-3 mt-3">
                        <input type="text" class="form-control" name="benefit_header[]" placeholder="Benefits list" style="display: inline-block; margin-right: -58px">
                        <span class="remove-benefit btn btn-danger btn-sm"><i class="fa fa-times"></i></span>
                    </div>`;

               benefit.append(data);
            });
            // remove benefits list
            $('#benefit').on('click', '.remove-benefit', function() {
                $(this).closest('.benefit-list').remove();
            });
            // upload image preview
            $(".upload").change(function() {
                $('#blah').removeClass('d-none');
            });
            $(".upload2").change(function() {
                $('#blah2').removeClass('d-none');
            });
            $(".upload3").change(function() {
                $('#blah3').removeClass('d-none');
            });
            $(".upload4").change(function() {
                $('#blah4').removeClass('d-none');
            });




        });
    </script>

@endsection
