<ul>
    @foreach($childs as $child)
        <li>
            @if(count($child->childs))
                @if (old('id_parent', $category->id_parent) != 1)
                    <i class="indicator fas fa-folder-open"></i>
                @else
                    <i class="indicator fas fa-folder"></i>
                @endif
                <input type="radio" name="id_parent" id="category-{{ $child->id_category }}"
                       value="{{ $child->id_category }}" disabled>
                <button class="btn">{{ $child->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}</button>
                @include('admin.categories.category-child-edit-disabled', ['childs' => $child->childs])
            @else
                <input type="radio" name="id_parent" id="category-{{ $child->id_category }}"
                       value="{{ $child->id_category }}" disabled>
                {{ $child->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}
            @endif
        </li>
    @endforeach
</ul>