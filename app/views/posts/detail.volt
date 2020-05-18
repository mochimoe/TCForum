{% extends 'templates/base.volt' %}
{% block title %}{{ get_title() }}{% endblock %}

{% block content %}
    <div class="container row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="d-flex justify-content-center">
                <div class="container text-white">
                    <div class="section-row">
                        <h5 class="lead font-weight-bold">{{posts.judul}}</h5>
                        
                        {% for user in users %}
                            {% if(user.id == posts.id_user) %}
    
                            <div class="d-flex align-self-center text-white">
                                <div class="profil mr-2"></div>
                                <div class=" ">
                                    <p class="pr-2" style="font-size: 12px;">{{user.nama}} <br> Angkatan {{user.angkatan}}</p>
                                </div>
                                
                                <!-- {% if (post.id_user == auth['id']) %}
                                <a href="/posts/edit/{{post.id}}" class="small-text p-1 text-white bg-primary rounded"><i class="fas fa-edit"></i></a>
                                <a href="/posts/delete/{{post.id}}" class="small-text text-white bg-danger p-1 rounded"><i class="fas fa-trash"></i></a>
                                {% endif %} -->
                            </div>
    
                            {% endif %}
                        {% endfor %}
                    </div>
                    
                    <div class="section-row">
                        <p>
                            {{posts.isi}}
                        </p>
                    </div>
    
                    <div class="dropdown-divider"></div>
                    <div class="section-row"><h5 class="font-weight-bold">Komentar Netizen</h5></div>
                    <div class="section-row">
                        <form action="/komen/create/{{posts.id}}" method="post">
                            <input type="text" name="isi_komen" class="form-control" placeholder="komen disini hyung...">
                            <div class="d-flex flex-row-reverse ">
                                <button class="btn btn-sm btn-primary mt-3">Komen skuy</button>
                            </div>
                        </form>
                        
                    </div>
    
                    {% for komen in komenss %}
                        {% for user in users %}
                            {% if (user.id == komen.id_user) %}
                    <div class="card my-3 text-white bg-secondary">
                        <div class="card-title card-header font-weight-bold d-flex">
                            <p class="">
                                 {{user.nama}}
                            </p>
                            {% if (user.id == auth['id']) %}
                                <a href="/komen/delete/{{komen.id}}" class="p-1 ml-3 justify-content-end small-text text-white bg-danger rounded-sm align-self-baseline" style="font-size: 12px;">Hapus</a>
                                <a href="/komen/editkomen/{{komen.id}}" class="p-1 ml-3 justify-content-end small-text text-white bg-info rounded-sm align-self-baseline" style="font-size: 12px;">Edit</a>
                            {% endif %}
                        </div>
                        
                        <div class="card-body">
                            <p>{{komen.isi_komen}}</p>
                        </div>
                    </div>
                            {% endif %}
                        {% endfor %}
                    {% endfor %}
                    
                </div>
            </div>
        </div>
        <div class=""></div>
        
    </div>
{% endblock %}