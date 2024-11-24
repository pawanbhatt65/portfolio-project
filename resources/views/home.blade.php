@extends('layout.layout')

@section('title')
    Home
@endsection

@section('contents')
    <section class="head-menu">
        <div class="container">
            @include('menu-item')

            <div class="row">
                <div class="col-12">
                    <div class="content">
                        <div class="content-text">
                            <div class="profile-img">
                                <img src="{{ asset('assets/images/pawan.JPG') }}" alt="Pawan Bhatt" title="Pawan Bhatt"
                                    class="img">
                            </div>
                            <h3>Hi there! 👋, this is Pawan Bhatt.</h3>
                            <p>
                                I'm a passionate Full Stack Developer with over 3 years of experience crafting dynamic,
                                user-friendly, and visually appealing web applications. My journey in web development has
                                equipped me with expertise in both frontend and backend technologies, allowing me to build
                                seamless and interactive experiences for users.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @include('links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
