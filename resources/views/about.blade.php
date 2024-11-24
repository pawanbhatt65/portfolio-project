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
                            Hi there! 👋 I'm a passionate Full Stack Developer with over 3 years of experience crafting
                            dynamic, user-friendly, and visually appealing web applications. My journey in web development
                            has equipped me with expertise in both frontend and backend technologies, allowing me to build
                            seamless and interactive experiences for users.
                        </p>
                        <h3>Frontend Development</h3>
                        <p>
                            I specialize in creating stunning, responsive, and cross-browser-compatible interfaces using
                            HTML, CSS, and JavaScript. I also leverage frameworks like React JS to develop dynamic and
                            highly interactive Single Page Applications (SPAs).
                        </p>
                        <h3>Backend Development</h3>
                        <p>
                            I design and implement robust, scalable backends using PHP and Laravel, integrated with MySQL
                            and PostgreSQL databases. My backend expertise ensures efficient data handling and smooth
                            communication with frontend applications.
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
                                    <p>70%</p>
                                </div>
                            </li>
                            <li>
                                <span>JQuery</span>
                                <div class="learning-progress-box jquery">
                                    <p>60%</p>
                                </div>
                            </li>
                            <li>
                                <span>React JS</span>
                                <div class="learning-progress-box reactJs">
                                    <p>70%</p>
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
                                    <p>70%</p>
                                </div>
                            </li>
                            <li>
                                <span>MYSQL</span>
                                <div class="learning-progress-box mysql">
                                    <p>75%</p>
                                </div>
                            </li>
                            <li>
                                <span>Laravel</span>
                                <div class="learning-progress-box laravel">
                                    <p>68%</p>
                                </div>
                            </li>
                            <li>
                                <span>RestFul API</span>
                                <div class="learning-progress-box restfulAPI">
                                    <p>68%</p>
                                </div>
                            </li>
                            <li>
                                <span>PostgreSQL</span>
                                <div class="learning-progress-box postgreSQL">
                                    <p>50%</p>
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
                                <span>GITHUB</span>
                                <div class="learning-progress-box gitBash">
                                    <p>80%</p>
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
                                    <p>40%</p>
                                </div>
                            </li>
                            <li>
                                <span>Figma</span>
                                <div class="learning-progress-box figma">
                                    <p>40%</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="download-resume">
                        <button class="btn resume_download_btn">Download Resume</button>
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
                            <ul class="min-height">
                                <li>
                                    FindNest is a website dedicated to finding properties.
                                </li>
                                <li>
                                    The website's frontend was developed using HTML, CSS, and
                                    JavaScript, while the backend was built using Laravel and
                                    MySQL database.
                                </li>
                                <li>
                                    Users can register as property owners or tenants.
                                </li>
                                <li>
                                    A property find filter was implemented to enhance the user
                                    experience, making it easier for users to search for
                                    properties based on their preferences.
                                </li>
                                <li>
                                    Additionally, an admin panel was created to manage various
                                    aspects of the website.
                                </li>
                            </ul>
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
                            <ul class="min-height">
                                <li>
                                    DelQui is a web application that serves as an online
                                    platform or store, similar to an e-commerce app.
                                </li>
                                <li>
                                    My role involved working on the website for DelQui.
                                </li>
                                <li>
                                    I developed the website's front-end using HTML, CSS, and
                                    JavaScript, while the back-end was built using core PHP and
                                    MySQL database.
                                </li>
                                <li>
                                    The website allows service or delivery personnel to
                                    register, either through the web interface or the mobile
                                    app.
                                </li>
                                <li>
                                    Upon user registration on the app, their data is stored in
                                    the database, and an email notification is sent to both the
                                    user and the admin.
                                </li>
                                <li>
                                    I created an admin panel to manage various aspects of the
                                    platform.
                                </li>
                                <li>
                                    The admin panel includes features to view lists of service
                                    personnel, delivery personnel, and products, with pagination
                                    for easier navigation.
                                </li>
                                <li>
                                    A search functionality was implemented to enable users to
                                    quickly find specific items or personnel.
                                </li>
                                <li>
                                    I integrated a bulk product upload feature, allowing
                                    administrators to upload multiple products simultaneously
                                    using a CSV file.
                                </li>
                                <li>
                                    I implemented the functionality to download the product list
                                    as a CSV file, providing administrators with an easy way to
                                    access and manage product data.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/dayzero.png') }}" alt="DayZero" class="img"
                                title="DayZero">
                            <ul class="using-language">
                                <li>Laravel</li>
                                <li>MySQL</li>
                                <li>Java</li>
                            </ul>
                            <div class="project-title">
                                <p>DayZero</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    DayZero is an app designed to help naukri find candidates
                                    who graduated within the last 5 years.
                                </li>
                                <li>
                                    The app's API was developed using Laravel with a MySQL
                                    database.
                                </li>
                                <li>
                                    Candidates have the option to upload an introductory video.
                                </li>
                                <li>
                                    Recruiters can either select or reject candidates by swiping
                                    right or left, respectively.
                                </li>
                                <li>
                                    The app includes job search functionality to help candidates
                                    find suitable opportunities.
                                </li>
                                <li>
                                    Additionally, an admin panel was created to manage various
                                    aspects of the app.
                                </li>
                                <li>
                                    The admin panel allows for the download of lists of
                                    recruiters, candidates, and jobs.
                                </li>
                                <li>
                                    Search functionality has been implemented to facilitate easy
                                    navigation within the app.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/lituplabs.png') }}" alt="LitUpLabs" class="img"
                                title="LitUpLabs">
                            <ul class="using-language">
                                <li>React JS</li>
                                <li>Laravel</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>LitUpLabs</p>
                            </div>
                            <div class="live">
                                <a target="_blank" href="https://lituplabs.com/">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    LitUpLabs is a React JS app where users can learn skills
                                    like Analytics, Business Automation, etc.
                                </li>
                                <li>
                                    Users can search for courses.
                                </li>
                                <li>
                                    To gain these skills, users can create an account as a
                                    student.
                                </li>
                                <li>
                                    During the signup process, users must verify their mobile
                                    number and email.
                                </li>
                                <li>
                                    Students can log in to the portal using their email and
                                    password or mobile number with an OTP.
                                </li>
                                <li>
                                    Students can find courses that meet their needs, add them to
                                    the cart, and buy them.
                                </li>
                                <li>
                                    After purchasing a course, the admin schedules a date with a
                                    particular instructor to teach the student.
                                </li>
                                <li>
                                    Students can give feedback to the instructor twice: first
                                    during the course and then after completing the course.
                                </li>
                                <li>
                                    After completing the course, students can take a quiz.
                                </li>
                                <li>
                                    After the quiz, they can download a certificate.
                                </li>
                                <li>
                                    Students can also give feedback about the course.
                                </li>
                                <li>
                                    Students can check their courses to see which ones they have
                                    completed and which are in progress.
                                </li>
                                <li>
                                    Students can go to their account page to check their details
                                    like email, phone number, education, etc., and can update
                                    these details except for the email or mobile number.
                                </li>
                                <li>
                                    If someone wants to teach students as an instructor, they
                                    can contact the admin on the contact us page.
                                </li>
                                <li>
                                    The admin must approve them first.
                                </li>
                                <li>
                                    After admin approval, they can log in to the portal as an
                                    instructor using their email and password or mobile number.
                                </li>
                                <li>
                                    After logging in, the instructor is redirected to their
                                    dashboard.
                                </li>
                                <li>
                                    In the instructor dashboard, they can check their completed
                                    and in-progress courses.
                                </li>
                                <li>
                                    Instructors also have an account page where they can view
                                    and update their details.
                                </li>
                                <li>Instructors can also give feedback about themselves.</li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/kheldhara.png') }}" alt="Kheldhara" class="img"
                                title="Kheldhara">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>Laravel</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>Kheldhara</p>
                            </div>
                            <div class="live">
                                <a href="https://kheldhaara.com/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>Kheldhara is a Tennis Tournament app.</li>
                                <li>
                                    The app is created using HTML, CSS, JavaScript, Laravel, and
                                    MySQL.
                                </li>
                                <li>
                                    A visitor can check which tournaments are ongoing, upcoming,
                                    or past.
                                </li>
                                <li>
                                    They can also view the list of players registered on the
                                    portal.
                                </li>
                                <li>
                                    Players are ranked according to their AITA-provided ranks.
                                </li>
                                <li>
                                    Users can register as player or register as academy and,
                                    after logging in, fill in their details like photo, AITA
                                    number, etc.
                                </li>
                                <li>
                                    Both players and academies can also update their details.
                                </li>
                                <li>Both players and academies can add multiple photos.</li>
                                <li>Academies can create and update tournaments.</li>
                                <li>Admins approve players and academies.</li>
                                <li>
                                    Admins can add or update the player rank list using a CSV
                                    file.
                                </li>
                                <li>
                                    Admins have full CRUD (Create, Read, Update, Delete)
                                    functionalities.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/ndi.png') }}" alt="Ndi.org.in" class="img"
                                title="Ndi.org.in">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>Laravel</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>Ndi.org.in</p>
                            </div>
                            <div class="live">
                                <a href="https://ndi.org.in/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    Ndi.org.in is a website offering mountaineering courses.
                                </li>
                                <li>
                                    The website's frontend was developed using HTML, CSS, and
                                    JavaScript, while the backend was built using Laravel with a
                                    MySQL database.
                                </li>
                                <li>
                                    Users can register for various courses offered on the
                                    platform.
                                </li>
                                <li>
                                    Upon user registration, both the admin and user receive
                                    email notifications, and the registration data is stored in
                                    the database.
                                </li>
                                <li>
                                    Additionally, an admin panel was created to manage various
                                    aspects of the website.
                                </li>
                                <li>
                                    The admin panel includes features to display the list of
                                    registered users with pagination for easier navigation.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/archproexperts.png') }}" alt="ArchProExpert" class="img"
                                title="ArchProExpert">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>Laravel</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>ArchProExpert</p>
                            </div>
                            <div class="live">
                                <a href="https://www.archproexpert.com/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    ArchProExpert is a web platform offering a variety of
                                    courses and products.
                                </li>
                                <li>
                                    The frontend of the project was developed using HTML, CSS,
                                    and JavaScript, while the backend utilizes Laravel and MySQL
                                    database.
                                </li>
                                <li>
                                    It includes features such as SignUp, LogIn, and Forgot
                                    Password functionality.
                                </li>
                                <li>
                                    Upon logging in, users are redirected to their dashboard
                                    where they can view purchased and recommended courses.
                                </li>
                                <li>
                                    As users complete video sessions, their progress percentage
                                    increases, similar to platforms like Udemy.
                                </li>
                                <li>
                                    Upon completing a course, users can download a certificate.
                                </li>
                                <li>
                                    The certificate dynamically includes user name, instructor
                                    name, course completion date, and certificate number.
                                </li>
                                <li>Users have the option to logout when desired.</li>
                                <li>
                                    An admin panel has been created for managing the website.
                                </li>
                                <li>
                                    Admins can view registered users, their purchased courses,
                                    and progress. They can also add courses, videos, and
                                    resource PDFs for each video.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/expert_alliance.png') }}" alt="Experts Alliance"
                                class="img" title="Experts Alliance">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>Experts Alliance</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    Experts Alliance is a web platform built using HTML, CSS,
                                    JavaScript, and PHP.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/bPatelArchitects.png') }}" alt="BPatelArchitects"
                                class="img" title="BPatelArchitects">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>BPatelArchitects</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    BPatelArchitects is a web platform built using HTML, CSS,
                                    JavaScript, and PHP.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/cleanAirLibrary.png') }}" alt="CleanAirLibrary"
                                class="img" title="CleanAirLibrary">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>WordPress</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>CleanAirLibrary</p>
                            </div>
                            <div class="live">
                                <a href="https://cleanairlibrary.in/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    CleanAirLibrary is a website that underwent conversion from
                                    HTML to WordPress. Within the WordPress admin dashboard,
                                    administrators can add case studies.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/sanskritiTrust.png') }}" alt="SanskritiTrust"
                                class="img" title="SanskritiTrust">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>SanskritiTrust</p>
                            </div>
                            <div class="live">
                                <a href="https://sanskrititrust.org/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    SanskritiTrust is a non-profit organization dedicated to
                                    educating children, establishing libraries, and donating
                                    books.
                                </li>
                                <li>
                                    The organization's website is built using HTML, CSS,
                                    JavaScript, and PHP with a MySQL database backend.
                                </li>
                                <li>
                                    Within the admin panel, administrators have the ability to
                                    add libraries and newsletters.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/eTechDreams.png') }}" alt="ETechDreams" class="img"
                                title="ETechDreams">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>ETechDreams</p>
                            </div>
                            <div class="live">
                                <a href="https://etechdreams.com/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>ETechDreams is a web or app development organization.</li>
                                <li>
                                    The frontend of the project was developed using HTML, CSS,
                                    and JavaScript, while the backend utilizes PHP and MySQL
                                    database.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/ekAurOpinion.png') }}" alt="EkAurOpinion" class="img"
                                title="EkAurOpinion">
                            <ul class="using-language">
                                <li>React JS</li>
                                <li>Laravel</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>EkAurOpinion</p>
                            </div>
                            <div class="live">
                                <a href="https://ekauropinion.com/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    EkAurOpinion is a web portal designed for individuals
                                    seeking a second opinion from consulting doctors.
                                </li>
                                <li>
                                    The application is built using React JS, ensuring a seamless
                                    and interactive user experience.
                                </li>
                                <li>
                                    It features a contact us form with frontend validation for
                                    enhanced user engagement and reliability.
                                </li>
                                <li>
                                    Additionally, it includes a registration form for doctors
                                    with built-in validation to streamline the registration
                                    process.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/front_end.png') }}" alt="GitHub repository" class="img"
                                title="GitHub repository">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                            </ul>
                            <div class="project-title">
                                <p>GitHub repository</p>
                            </div>
                            <div class="live">
                                <a href="https://pawanbhatt65.github.io/portfolio/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    This is my GitHub repository showcasing various projects
                                </li>
                                <li>
                                    Developed using HTML, CSS and JavaScript, ensuring a modern
                                    and responsive user interface.
                                </li>
                                <li>
                                    Features projects from my professional portfolio as well as
                                    personal GitHub contributions.
                                </li>
                                <li>
                                    Includes a dedicated section introducing myself and offering
                                    the option to download my resume.
                                </li>
                                <li>
                                    Highlights my skills, work experiences, and educational
                                    background for potential employers.
                                </li>
                                <li>
                                    Implemented a contact form enabling users to reach out, with
                                    details sent to me via email upon submission.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/portfolio_laravel.png') }}" alt="GitHub repository"
                                class="img" title="GitHub repository">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>Laravel</li>
                                <li>MYSQL</li>
                            </ul>
                            <div class="project-title">
                                <p>GitHub repository</p>
                            </div>
                            <div class="live">
                                <a href="javascript:void(0)">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    This is my GitHub repository for a project I've worked on.
                                    The project features a front-end developed using HTML, Core
                                    CSS, and Core JavaScript, while the back-end is powered by
                                    Laravel and MySQL database.
                                </li>
                                <li>
                                    It includes sign-up and login functionality for users.
                                </li>
                                <li>Once logged in, users can perform CRUD operations.</li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/form_node.png') }}" alt="GitHub project" class="img"
                                title="GitHub project">
                            <ul class="using-language">
                                <li>React JS</li>
                                <li>Node JS</li>
                                <li>Express JS</li>
                                <li>MongoDB</li>
                            </ul>
                            <div class="project-title">
                                <p>GitHub project</p>
                            </div>
                            <div class="live">
                                <a href="https://github.com/pawanbhatt65/react-form-node-js" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>This is my GitHub project.</li>
                                <li>Built using React JS, Node JS, Express JS and MongoDB database.</li>
                                <li>It comprises a Homepage and a Contact Us page.</li>
                                <li>
                                    Frontend validation is implemented for the Contact form.
                                </li>
                                <li>Submitted form data is stored in the database.</li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/khairah.png') }}" alt="GitHub project" class="img"
                                title="GitHub project">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>SCSS</li>
                                <li>JQuey</li>
                            </ul>
                            <div class="project-title">
                                <p>GitHub project</p>
                            </div>
                            <div class="live">
                                <a href="https://pawanbhatt65.github.io/khairah/index.html" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    Khairah is my GitHub project developed using SCSS and
                                    jQuery.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/calculator.png') }}" alt="GitHub repository"
                                class="img" title="GitHub repository">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                            </ul>
                            <div class="project-title">
                                <p>GitHub repository</p>
                            </div>
                            <div class="live">
                                <a href="https://github.com/pawanbhatt65/calculator" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>
                                    The Calculator project on GitHub is developed using core
                                    JavaScript.
                                </li>
                            </ul>
                            <div class="about-project-read-more">
                                <button type="button" class="btn read-more-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/contact_form.png') }}" alt="GitHub project" class="img"
                                title="GitHub project">
                            <ul class="using-language">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                            </ul>
                            <div class="project-title">
                                <p>GitHub project</p>
                            </div>
                            <div class="live">
                                <a href="https://pawanbhatt65.github.io/contact-form/" target="_blank">Live</a>
                            </div>
                        </div>
                        <div class="about-project">
                            <ul class="min-height">
                                <li>Contact form was created using core JavaScript.</li>
                            </ul>
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
    <script>
        const resumePath = "{{ asset('/assets/resume/pawan-dev.pdf') }}"
        // console.log(resumePath)
    </script>
@endsection
