@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <input class="form-control" type="text" name="name" id="" placeholder="Nome:" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input class="form-control" type="text" name="price" id="" placeholder="Preço:" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input class="form-control" type="text" name="description" id="" placeholder="Descrição:" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">            
    <input type="file" name="image">            
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>            
</div>