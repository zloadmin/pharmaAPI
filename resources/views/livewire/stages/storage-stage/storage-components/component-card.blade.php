<div class="component-card">
    <h4>{{ $component->name }}</h4>
    <p>{{ $component->type->label() }}</p>
    <img src="{{ $component->image_url }}" alt="" width="100">
    <p>{{ $component->description }}</p>
</div>