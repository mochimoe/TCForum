{% extends 'templates/base.volt' %}
{% block title %}{{ get_title() }}{% endblock %}

{% block content %}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="section-row"><h5 class="text-white font-weight-bold">Akun Saya</h5></div>
                <div class="card bg-dark border mb-3 border-0 shadow rounded-0">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="profil m-auto"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class=" align-self-start">
                                        <h5 class="text-white text-center">{{auth['nama']}}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="card-p text-white text-center">Angkatan : {{auth['angkatan']}}</p> 
                                    </div> 
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="section-row"><h5 class=" text-white font-weight-bold ">Post Saya</h5></div>
                {% for post in posts %}
                    <div class="card mb-2 shadow border border-0 rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="profil"></div>
                                </div>
                                <div class="col-md-10">
                                    <a href="/posts/detail/{{post.id}}" class="card-title text-dark font-weight-bold title-card">{{post.judul}}</a>
                                    <div class=" align-self-start">
                                        <p class=" pr-2">{{post.kategori}}</p>
                                        <a href="/posts/edit/{{post.id}}" class="small-text p-1 text-white bg-info">Edit post</a>
                                        <a href="/posts/delete/{{post.id}}" class="small-text text-white bg-danger p-1 ">Delete post</a>
                                    </div>
                                    <div class="pt-3">
                                        <p class="card-p">{{post.isi}}</p> 
                                    </div> 
                                </div>
                            </div>
                        </div>    
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>
{% endblock %}