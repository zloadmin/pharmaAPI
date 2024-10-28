<div>
    <h1>Count: {{ $cartItems->count() }}</h1>
    @foreach($cartItems as $cartItem)
        <div style="float: left; border: 1px solid green; padding: 5px; margin: 5px">
            <h4>{{ $cartItem->component->name ?? 'name' }}</h4>
            <p>{{ $cartItem->component->type->label() ?? 'label'}}</p>
            <p>{{ $cartItem->valueText }}</p>
        </div>
    @endforeach
</div>
