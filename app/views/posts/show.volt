{% extends 'templates/base.volt' %}
{% block title %}{{ get_title() }}{% endblock %}

{% block content %}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="section-row"><h5 class=" font-weight-bold">Bagaimana bukumu hari ini?</h5></div>
                <div class="card border mb-3 border-0 shadow rounded-0">
                    <div class="card-body">
                        <form action="/posts/save" method="post">
                            <div class="form-group">
                                <label for="judul" class="text-dark">Judul</label>
                                <input type="text" name="judul"class="form-control ">
                            </div>
                            <div class="form-group">
                                <label for="judul" class="text-dark ">Isi Post</label>
                                <textarea class=" form-control" name="isi" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori:</label>
                                <select name="kategori">
                                    <option value="Kuliah">Kuliah</option>
                                    <option value="Serba-Serbi">Serba-Serbi</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-dark">Post</button>
                        </form>
                    </div>
                </div>
                <div class="card border mb-3 border-0 shadow rounded-0">
                    <div class="card-body">
                        <a href="/posts/showkuliah">Kuliah</a>
                        <a href="/posts/showSerba">Serba-Serbi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="section-row"><h5 class=" font-weight-bold ">Linimasa</h5></div>
                {% for post in posts %}
                    {% for user in users %}
                        {% if (post.id_user == user.id) %}
                            <div class="card mb-2 shadow border border-0 rounded-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="profil"></div>
                                        </div>
                                        <div class="col-md-10">
                                            <a href="/posts/detail/{{post.id}}" class="card-title text-dark font-weight-bold title-card">{{post.judul}}</a>
                                            <div class=" align-self-start">
                                                <p class=" pr-2">{{user.nama}}</p>
                                                <p class=" pr-2">{{post.kategori}}</p>
                                                {% if (post.id_user == auth['id']) %}
                                                <a href="/posts/edit/{{post.id}}" class="small-text p-1 text-white bg-info">Edit post</a>
                                                <a href="/posts/delete/{{post.id}}" class="small-text text-white bg-danger p-1 ">Delete post</a>
                                                {% endif %}
                                            </div>
                                            <div class="pt-3">
                                                <p class="card-p">{{post.isi}}</p> 
                                            </div> 
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        {% endif %}
                    {% endfor %}
                {% endfor %}
            </div>
        </div>
    </div>
{% endblock %}