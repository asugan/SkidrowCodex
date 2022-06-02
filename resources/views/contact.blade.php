@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-white">
                <h1>Feedback</h1>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="name" id="" placeholder="Your Name" class="pt-3 pb-3 mt-5 form-control">
                    </div>
                    <div class="col-6">
                        <input type="text" name="email" id="" placeholder="Your E-Mail" class="pt-3 pb-3 mt-5 form-control">
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <input type="text" name="topic" id="" placeholder="Topic"
                                    class="form-control pt-3 pb-3 mt-3">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control  mt-3" rows="6" placeholder="Your Message"></textarea>
                    </div>
                    <div class="col-xs-12">
                        <div class="d-flex justify-content-center">
                            <button class="btn mt-3 ps-5 pe-5 submit-button" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
