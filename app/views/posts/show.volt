{% extends 'templates/base.volt' %}
{% block title %}{{ get_title() }}{% endblock %}

{% block content %}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <div class="card border bg-dark shadow mb-3 border-0 shadow rounded-0">
                    <div class="card-body d-flex flex-column">
                        <a href="/posts/showkuliah" class="dropdown-item text-white"><i class="fas fa-graduation-cap"></i> Kuliah</a>
                        <a href="/posts/showSerba"class="dropdown-item text-white"><i class="fas fa-theater-masks"></i> Serba-Serbi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                {% for post in posts %}
                    {% for user in users %}
                        {% if (post.id_user == user.id) %}
                            <div class="card mb-2 bg-dark shadow border-0 rounded-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class=" mb-3">
                                                <a href="/posts/detail/{{post.id}}" class="card-title text-white font-weight-bold title-card" style="font-size: 18px;">{{post.judul}}</a>
                                            </div>
                                            <div class="d-flex align-self-center text-white">
                                                <div class="profil mr-2"></div>
                                                <div class=" ">
                                                    <p class="pr-2" style="font-size: 12px;">{{user.nama}} | Angkatan {{user.angkatan}}</p>
                                                </div>
                                                
                                                <!-- {% if (post.id_user == auth['id']) %}
                                                <a href="/posts/edit/{{post.id}}" class="small-text p-1 text-white bg-primary rounded"><i class="fas fa-edit"></i></a>
                                                <a href="/posts/delete/{{post.id}}" class="small-text text-white bg-danger p-1 rounded"><i class="fas fa-trash"></i></a>
                                                {% endif %} -->
                                            </div>
                                            <div class="pt-3 text-white">
                                                <p class="card-p">{{post.isi}}</p> 
                                            </div> 
                                        </div>
                                        <div class="d-flex align-self-start col-md-2">
                                            <div class="bg-primary rounded-sm text-white mr-1 p-1" style="font-size: 10px;">{{post.kategori}}</div>
                                            {% if (post.id_user == auth['id']) %}
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                                                  <a class="dropdown-item text-white" href="/posts/edit/{{post.id}}"><i class="fas fa-edit"></i> Edit</a>
                                                  <a class="dropdown-item text-white" href="/posts/delete/{{post.id}}"><i class="fas fa-trash"></i> Hapus</a>
                                                </div>
                                            </div>
                                            {% endif %}
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        {% endif %}
                    {% endfor %}
                {% endfor %}
            </div>
            <div class="col-md-3">
                <div class="card border mb-3 shadow border-0 rounded-0 bg-dark">
                    <div class="card-body">
                        <form action="/posts/save" method="post">
                            <div class="form-group">
                                <label for="judul" class="text-white font-weight-bold" style="font-size: 18px;">Judul</label>
                                <input type="text" name="judul"class="form-control bg-dark text-white">
                            </div>
                            <div class="form-group">
                                <label for="judul" class="text-white font-weight-bold" style="font-size: 18px;">Isi Post</label>
                                <textarea class="form-control bg-dark text-white" name="isi" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori" class="text-white font-weight-bold" style="font-size: 18px;">Kategori: </label>
                                <select name="kategori" class="bg-dark text-white">
                                    <option value="Kuliah" class="text-white">Kuliah</option>
                                    <option value="Serba-Serbi" class="text-white">Serba-Serbi</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary font-weight-bold text-center" style="width:100%;">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}