@extends('layout.layout')

@section('title')
    About Me
@endsection

@section('contents')
    <section class="about-section">
        <div class="container">
            @include('menu-item')

            {{-- about-me start --}}
            <div class="row">
                <div class="col-12">
                    <div class="about-me-text">
                        <h2>About Me</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, error velit veritatis quasi
                            similique sapiente perspiciatis optio repudiandae nihil magni dignissimos illum facere? Quidem
                            odio
                            debitis eligendi eos praesentium ab nobis nulla aliquam sapiente, possimus laboriosam
                            accusantium
                            dicta, facere pariatur quas corporis molestiae consequatur repudiandae et magni? Expedita, odit
                            praesentium itaque veniam doloremque est quisquam voluptatum, placeat facilis tempora iure fugit
                            odio quae reiciendis, possimus temporibus quaerat veritatis necessitatibus numquam et quos nam.
                            Enim
                            laboriosam consequuntur sunt, cupiditate qui doloribus modi ratione voluptatum omnis aliquid,
                            veritatis optio similique aut quo ab! Error quod explicabo ut. Saepe cupiditate aliquid minus?
                            Provident.
                        </p>
                    </div>
                </div>
            </div>
            {{-- about-me end --}}

            {{-- our-skills start --}}
            <div class="row equal-height">
                <div class="col-12">
                    <div class="skills-heading">
                        <h2>Our Skills</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="skills-box">
                        <h3>Front-End</h3>
                        <ul class="skills-list">
                            <li>
                                <span>HTML</span>
                                <div class="learning-progress-box html">
                                    <p>80%</p>
                                </div>
                            </li>
                            <li>
                                <span>CSS</span>
                                <div class="learning-progress-box css">
                                    <p>80%</p>
                                </div>
                            </li>
                            <li>
                                <span>SASS</span>
                                <div class="learning-progress-box sass">
                                    <p>60%</p>
                                </div>
                            </li>
                            <li>
                                <span>Bootstrap</span>
                                <div class="learning-progress-box bootstrap">
                                    <p>80%</p>
                                </div>
                            </li>
                            <li>
                                <span>JavaScript</span>
                                <div class="learning-progress-box javascript">
                                    <p>60%</p>
                                </div>
                            </li>
                            <li>
                                <span>JQuery</span>
                                <div class="learning-progress-box jquery">
                                    <p>50%</p>
                                </div>
                            </li>
                            <li>
                                <span>React JS</span>
                                <div class="learning-progress-box reactJs">
                                    <p>50%</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="skills-box">
                        <h3>Back-End</h3>
                        <ul class="skills-list">
                            <li>
                                <span>PHP</span>
                                <div class="learning-progress-box php">
                                    <p>50%</p>
                                </div>
                            </li>
                            <li>
                                <span>MYSQL</span>
                                <div class="learning-progress-box mysql">
                                    <p>68%</p>
                                </div>
                            </li>
                            <li>
                                <span>Laravel</span>
                                <div class="learning-progress-box laravel">
                                    <p>65%</p>
                                </div>
                            </li>
                            <li>
                                <span>RestFul API</span>
                                <div class="learning-progress-box restfulAPI">
                                    <p>60%</p>
                                </div>
                            </li>
                            <li>
                                <span>PostgreSQL</span>
                                <div class="learning-progress-box postgreSQL">
                                    <p>30%</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="skills-box">
                        <h3>Other Skills</h3>
                        <ul class="skills-list">
                            <li>
                                <span>GIT BASH</span>
                                <div class="learning-progress-box gitBash">
                                    <p>60%</p>
                                </div>
                            </li>
                            <li>
                                <span>GIT GUI</span>
                                <div class="learning-progress-box gitGUI">
                                    <p>50%</p>
                                </div>
                            </li>
                            <li>
                                <span>WordPress</span>
                                <div class="learning-progress-box wordPress">
                                    <p>80%</p>
                                </div>
                            </li>
                            <li>
                                <span>Photoshop</span>
                                <div class="learning-progress-box photoShop">
                                    <p>20%</p>
                                </div>
                            </li>
                            <li>
                                <span>Figma</span>
                                <div class="learning-progress-box figma">
                                    <p>20%</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="download-resume">
                        <a href="javascript:void(0)" class="btn">Download Resume</a>
                    </div>
                </div>
            </div>
            {{-- our-skills end --}}

            {{-- projects-start --}}
            <div class="row equal-height margin-bottom-50">
                <div class="col-12">
                    <div class="skills-heading">
                        <h2>Projects</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/findnest.png') }}" alt="FindNest" class="img"
                                title="FindNest">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>Laravel</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>FindNest</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <p class="min-height">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt odio excepturi, eum odit
                                error ab aliquam voluptas dolor magnam nostrum natus rem quasi dicta voluptate nesciunt
                                nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti?
                            </p>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/delqui.png') }}" alt="DelQui" class="img" title="DelQui">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                                <li>Java</li>
                            </ul>
                            <div class="project-title">
                                <p>DelQui</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <p class="min-height">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt odio excepturi, eum odit
                                error ab aliquam voluptas dolor magnam nostrum natus rem quasi dicta voluptate nesciunt
                                nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti?
                            </p>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/delqui.png') }}" alt="DelQui" class="img" title="DelQui">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                                <li>Java</li>
                            </ul>
                            <div class="project-title">
                                <p>DelQui</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <p class="min-height">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt odio excepturi, eum odit
                                error ab aliquam voluptas dolor magnam nostrum natus rem quasi dicta voluptate nesciunt
                                nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti?
                            </p>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/delqui.png') }}" alt="DelQui" class="img" title="DelQui">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                                <li>Java</li>
                            </ul>
                            <div class="project-title">
                                <p>DelQui</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <p class="min-height">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt odio excepturi, eum odit
                                error ab aliquam voluptas dolor magnam nostrum natus rem quasi dicta voluptate nesciunt
                                nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti?
                            </p>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/delqui.png') }}" alt="DelQui" class="img"
                                title="DelQui">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                                <li>Java</li>
                            </ul>
                            <div class="project-title">
                                <p>DelQui</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <p class="min-height">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt odio excepturi, eum odit
                                error ab aliquam voluptas dolor magnam nostrum natus rem quasi dicta voluptate nesciunt
                                nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti?
                            </p>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/delqui.png') }}" alt="DelQui" class="img"
                                title="DelQui">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                                <li>Java</li>
                            </ul>
                            <div class="project-title">
                                <p>DelQui</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <p class="min-height">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt odio excepturi, eum odit
                                error ab aliquam voluptas dolor magnam nostrum natus rem quasi dicta voluptate nesciunt
                                nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti? Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit.
                                Incidunt odio excepturi, eum odit error ab aliquam voluptas dolor magnam nostrum natus rem
                                quasi dicta voluptate nesciunt nisi! Quaerat, totam deleniti?
                            </p>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- projects-end --}}

            @include('links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
