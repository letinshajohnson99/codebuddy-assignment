<ul>
    @foreach ($childs as $child)
        @php
            $cid = $child->id;
            $ctitle = $child->title;
        @endphp
        <li style="display: list-item;">
            {{ $child->title }}
            <a class="text-danger text-gradient px-3 mb-0" onclick="return confirm('Are you sure?')"
                href="{{ route('delete.category', $child->id) }}"><i class="far fa-trash-alt me-2"></i></a>
            <a class="text-dark mb-0" onclick="$('#category{{ $child->id }}').modal('show');"><i
                    class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
            @if (count($child->childs))
                @include('pages.manageChild', ['childs' => $child->childs])
            @endif
        </li>
        @include('pages.edit-category')
    @endforeach
</ul>
