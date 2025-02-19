@extends('layouts.app')

@section('content')
<div class="row row-sm justify-content-center">
    <div class="col-lg-6 d-flex justify-content-center">
        <div class="card mg-b-20 ">
            <div class="card-body">
                <div class="ps-0">
                    <div class="main-profile-overview">
                        
                        <div class="d-flex flex-column align-items-center text-center">
                            <!-- Profile Image -->
                            <div class="main-img-user profile-user" style="width: 150px; height: 150px;">
                                <img alt="" src="../vendor/img/RPL00756.JPG" style="width: 100%; height: 100%; object-fit: cover;">
                                <a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                            </div>
                        
                            <!-- Profile Name -->
                            <div class="mg-b-20">
                                <h5 class="main-profile-name">MUHAMMAD RIVALDI AKBAR</h5>
                                <p class="main-profile-name-text">Web Programmer</p>
                            </div>
                        
                            <!-- Bio -->
                            <h6>Bio</h6>
                            <div class="main-profile-bio">
                             Menjadi bagian dari anak yang harus mengusahakan mimpinya sendiri, bohong rasanya
                             jika tidak iri dengan mereka yang masa depannya sudah tersusun rapih oleh orang tuanya <a href="">More</a>
                            </div>
                        </div>
                        
                        <div class="main-profile-work-list">
                            <div class="media">
                                <div class="media-logo bg-primary-transparent text-primary">
                                    <i class="icon ion-logo-buffer"></i>
                                </div>
                                <div class="media-body">
                                    <h6>Studied at <a href="">SMKN 2 SUBANG</a></h6><span>2022-2025</span>
                                    <p>Graduation: first Graduation</p>
                                </div>
                            </div>
                        </div><!-- main-profile-work-list -->
                        <hr class="mg-y-30">
                        <label class="main-content-label tx-13 mg-b-20">Social</label>
                        <div class="main-profile-social-list">
                            <div class="media">
                                <div class="media-icon bg-success-transparent text-success">
                                    <i class="icon ion-logo-whatsapp"></i>
                                </div>
                                <div class="media-body">
                                    <span>Whatsapp</span>  <a href="https://whatsapp.com/rivall_ax" target="_blank" rel="noopener noreferrer">whatsapp.com/rival.me</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-logo-github"></i>
                                </div>
                                <div class="media-body">
                                 <span>Github</span> <a href="https://github.com/rivallax/todo-app-ukk" target="_blank" rel="noopener noreferrer">twitter.com/rival.me</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-success-transparent text-success">
                                    <i class="icon ion-logo-twitter"></i>
                                </div>
                                <div class="media-body">
                                    <span>Twitter</span> <a href="https://twitter.com/rivall_ax" target="_blank" rel="noopener noreferrer">twitter.com/rival.me</a>

                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-info-transparent text-info">
                                    <i class="icon ion-logo-linkedin"></i>
                                </div>
                                <div class="media-body">
                                    <span>Linkedin</span> <a href="">rivall.ax</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-danger-transparent text-danger">
                                    <i class="icon ion-md-link"></i>
                                </div>
                                <div class="media-body">
                                    <span>My Portfolio</span> <a href="">Rival.com/</a>
                                </div>
                            </div>
                        </div><!-- main-profile-social-list -->
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
