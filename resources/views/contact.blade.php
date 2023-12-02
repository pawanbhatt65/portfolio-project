@extends('layout.layout')

@section('title')
    contact-us
@endsection

@section('contents')
    <section class="contact-us">
        <div class="container">
            @include('menu-item')

            <div class="row">
                <div class="col-12">
                    <div class="get-into-touch">
                        <h3>Get Into Touch</h3>
                        <form action="{{ route('contactUsPost') }}" class="form-tag" method="post"
                            name="contactFormSubmitHandler">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="nameClass" />
                                <span class="error" id="nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" maxlength="13" class="nameClass" />
                                <span class="error" id="phoneError"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="nameClass" />
                                <span class="error" id="emailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" class="nameClass" />
                                <span class="error" id="subjectError"></span>
                            </div>
                            <div class="form-group-message">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" rows="5" maxlength="500" class="nameClass messageTextarea"></textarea>
                                <span class="error" id="messageError"></span>
                                <p id="count"></p>
                            </div>
                            <div class="form-group-submit">
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @include('links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
