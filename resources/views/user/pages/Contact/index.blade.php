@extends('user.partials.master')
@section('content')
    <style>
        .divInput {
            width: 500px;

        }

        .input1 {
            border: 2px solid #dfe2e1 !important;
        }

        .map {

            position: relative;
            left: 20px;
            width: 600px;
            height: 300px;
            bottom: 40px;
        }
    </style>
    <!-- section -->

    <section class="my-lg-14 my-8">
        <!-- container -->
        <div class="container">
            <div class="row">
                <!-- col -->
                <div class="offset-lg-2 col-lg-8 col-12">
                    <div class="mb-8">
                        <!-- heading -->
                        <h1>Contact</h1>

                    </div>
                    <!-- form -->
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <table>
                        <tr>
                            <th>
                                <form class="" method="POST" action="{{ route('user.sendMail') }}">
                                    @csrf
                                    <!-- input -->
                                    <div class=" mb-3 divInput">
                                        <label class="form-label" for="fname"> Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="fname" class="form-control input1" name="fname"
                                            placeholder="Enter Your First Name" required>
                                    </div>

                                    <div class=" mb-3 divInput">
                                        <label class="form-label" for="emailContact">Email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" id="emailContact" name="emailContact"
                                            class="form-control input1" placeholder="Enter Your Email" required>
                                    </div>
                                    <div class=" mb-3 divInput">
                                        <!-- input -->
                                        <label class="form-label" for="phone"> Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="phone" name="phone" class="form-control input1"
                                            pattern="[0-9]{10,13}" placeholder="Your Phone Number [10-13]" required>
                                    </div>
                                    <div class=" mb-3 divInput">
                                        <!-- input -->
                                        <label class="form-label" for="title"> Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="title" name="title" class="form-control input1"
                                            placeholder="Your Title" required>
                                    </div>
                                    <div class=" mb-3 divInput">
                                        <!-- input -->
                                        <label class="form-label" for="comments"> Comments <span
                                                class="text-danger">*</span></label>
                                        <textarea rows="3" id="comments" name="comments" class="form-control input1" placeholder="Additional Comments"
                                            required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- btn -->
                                        <button type="submit" class="btn btn-primary" name="action"
                                            value="send-mail">Submit</button>
                                    </div>
                                </form>
                            </th>
                            <th>
                                <div class="map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.268091181745!2d106.67926337469737!3d10.790767189358872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d35939c66f%3A0xe52e3ed732b15272!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEZQVCBQb2x5dGVjaG5pYyAoQ1MxKQ!5e0!3m2!1svi!2s!4v1683289418342!5m2!1svi!2s"
                                        width="80%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </th>
                        </tr>

                    </table>


                </div>
            </div>
        </div>

    </section>
    </main>
@endsection
