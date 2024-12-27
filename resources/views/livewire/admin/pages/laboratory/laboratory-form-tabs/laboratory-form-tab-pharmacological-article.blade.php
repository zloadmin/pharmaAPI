<!--- Фармакопейная статья Field --->
<div class="form-group">
    <label for="pharmacological_article">Фармакопейная статья</label>
    <select class="form-control @error('pharmacological_article_id') is-invalid @enderror" wire:model="pharmacological_article_id">
        <option value=""></option>
        @foreach($pharmacologicalArticles as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    @error('pharmacological_article_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>