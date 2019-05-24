<ul>
    @foreach($childs as $child)
        {{ $disabled = false }}
        <li>
            @if(count($child->childs))
                
                <input type="radio" name="id_parent" id="category-{{ $child->id_category }}"
                       value="{{ $child->id_category }}" {{ old('id_parent', $category->id_parent) == $child->id_category ? 'checked' : '' }}
                       @if($category->id_category == $child->id_category)
                           {{ $disabled = true }}
                           {{ $disabled == true ? 'disabled' : '' }}
                       @endif
                       >
                @if (old('id_parent', $category->id_parent) != 1)
                    <i class="indicator fas fa-folder-open"></i>
                @else
                    <i class="indicator fas fa-folder"></i>
                @endif
                <button class="btn">{{ $child->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}</button>
                @if($disabled)
                    @include('admin.categories.category-child-edit-disabled', ['childs' => $child->childs])
                @else
                    @include('admin.categories.category-child-edit', ['childs' => $child->childs])
                @endif
            @else
                <input type="radio" name="id_parent" id="category-{{ $child->id_category }}"
                       value="{{ $child->id_category }}" {{ old('id_parent', $category->id_parent) == $child->id_category ? 'checked' : '' }}
                       {{ old('id_parent', $category->id_category) == $child->id_category ? 'disabled' : '' }}>
                {{ $child->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}
            @endif
        </li>
    @endforeach
</ul>