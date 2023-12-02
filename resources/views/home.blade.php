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
                                <img src="{{ asset('assets/images/placeholder.png') }}" alt="Pawan Bhatt" title="Pawan Bhatt"
                                    class="img">
                            </div>
                            <h3>Hi there, this is Pawan Bhatt.</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, optio? Nisi quaerat
                                numquam at nobis saepe voluptatem pariatur molestiae distinctio, quibusdam alias explicabo
                                quam accusamus quia quod reprehenderit officia quas ullam necessitatibus ex possimus sit
                                repellendus ducimus! Nemo vitae, harum dolorum, est ex unde expedita accusamus molestiae
                                itaque veritatis consequatur.
                            </p>
                            {{-- <a href="https://caferati.me/">https://caferati.me/</a> --}}
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
