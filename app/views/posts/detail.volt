{% extends 'templates/base.volt' %}
{% block title %}{{ get_title() }}{% endblock %}

{% block content %}
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="container">
                <div class="section-row p-3 bg-dark rounded mb-3"><h5 class=" font-weight-bold  text-white">Halaman Detail</h5></div>

                <div class="section-row">
                    <h5 class="lead font-weight-bold">{{posts.judul}}</h5>
                    {% for user in users %}
                        {% if(user.id == posts.id_user) %}

                    <small>Author: {{user.nama}}</small>

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
                            <button class="btn btn-sm btn-dark">Komen skuy</button>
                        </div>
                    </form>
                    
                </div>

                {% for komen in komenss %}
                    {% for user in users %}
                        {% if (user.id == komen.id_user) %}
                <div class="card my-3">
                    <div class="card-title card-header font-weight-bold d-flex">
                        <p>
                             {{user.nama}}
                        </p>
                        {% if (user.id == auth['id']) %}
                            <a href="/komen/delete/{{komen.id}}" class="p-1 ml-3 justify-content-end small-text text-white bg-danger rounded align-self-baseline">Hapus</a>
                            <a href="/komen/delete/{{komen.id}}" class="p-1 ml-3 justify-content-end small-text text-white bg-danger rounded align-self-baseline">Hapus</a>
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
{% endblock %}