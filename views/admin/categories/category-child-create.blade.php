<ul>
    @foreach($childs as $child)
        <li>
            @if(count($child->childs))
                <input type="radio" name="id_parent" id="category-{{ $child->id_category }}" value="{{ $child->id_category }}" {{ old('id_parent', $idParent) == $child->id_category ? 'checked' : '' }}>
                @if (old('id_parent', $idParent))
                    <i class="indicator fas fa-folder-open"></i>
                @else
                    <i class="indicator fas fa-folder"></i>
                @endif
                <button class="btn">{{ $child->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}</button>
                @include('admin.categories.category-child-create', ['childs' => $child->childs])
            @else
                <input type="radio" name="id_parent" id="category-{{ $child->id_category }}"
                       value="{{ $child->id_category }}" {{ old('id_parent', $idParent) == $child->id_category ? 'checked' : '' }}>
                {{ $child->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}
            @endif
        </li>
    @endforeach
</ul>