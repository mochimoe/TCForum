{% extends 'templates/base.volt' %}
{% block title %}{{ get_title() }}{% endblock %}

{% block content %}
<div class="p-3 d-flex justify-content-center">
    <div class="card mb-3" style="width:35%;">
        <div class="card-header">Edit Post</div>
        <div class="card-body">
            <form action="/posts/update/{{posts.id}}" method="post">
                <div class="form-group">
                    <label for="judul" class="">Judul Buku</label>
                    <input type="text" name="judul"class="form-control" value="{{posts.judul}}">
                </div>
                <div class="form-group">
                    <label for="judul" class=" ">Isi Post</label>
                    <textarea class="form-control" name="isi" value="">{{posts.isi}}</textarea>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select name="kategori">
                        {% if posts.kategori is sameas("Kuliah") %}
                        <option value="Kuliah" selected>Kuliah</option>
                        <option value="Serba-Serbi">Serba-Serbi</option>
                        {% else %}
                        <option value="Kuliah">Kuliah</option>
                        <option value="Serba-Serbi" selected>Serba-Serbi</option>
                        {% endif %}
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
            </form>
        </div>
    </div>
    
</div>
{% endblock %}