@for ($i = 1; $i <= 5; $i++)
    <div class="size-5">

        @if ($i <= $count)
            <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img"
                 fill="none">
                <path fill="currentColor" fill-rule="evenodd" stroke="currentColor"
                      stroke-width="1.5"
                      d="M2.56 10.346l5.12 3.694-1.955 5.978c-.225.688.568 1.261 1.157.836L12 17.159l5.12 3.695c.587.425 1.381-.148 1.155-.836l-1.954-5.978 5.118-3.694c.589-.425.286-1.352-.442-1.352H14.67l-.166-.507-1.789-5.47c-.225-.69-1.205-.69-1.43 0L9.33 8.993H3.003c-.728 0-1.03.927-.442 1.352z"
                      clip-rule="evenodd">
                </path>
            </svg>
        @elseif($count  > $i - 1)
            <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img" fill="none">
                <path stroke="currentColor" stroke-width="2"
                      d="M2.56 10.346l5.12 3.694-1.955 5.978c-.225.688.568 1.261 1.157.836L12 17.159l5.12 3.695c.587.425 1.381-.148 1.155-.836l-1.954-5.978 5.118-3.694c.589-.425.286-1.352-.442-1.352H14.67l-1.955-5.978c-.225-.688-1.205-.688-1.43 0L9.33 8.994H3.003c-.728 0-1.03.927-.442 1.352z"
                      clip-rule="evenodd">
                </path>
                <mask id="partial-star-mask">
                    <rect x="0" y="0" width="{{($count - ($i - 1)) * 100}}%" height="100%" fill="white"/>
                </mask>

                <path fill="currentColor" fill-rule="evenodd" stroke="currentColor"
                      stroke-width="1.5"
                      d="M2.56 10.346l5.12 3.694-1.955 5.978c-.225.688.568 1.261 1.157.836L12 17.159l5.12 3.695c.587.425 1.381-.148 1.155-.836l-1.954-5.978 5.118-3.694c.589-.425.286-1.352-.442-1.352H14.67l-.166-.507-1.789-5.47c-.225-.69-1.205-.69-1.43 0L9.33 8.993H3.003c-.728 0-1.03.927-.442 1.352z"
                      clip-rule="evenodd" mask="url(#partial-star-mask)">
                </path>
            </svg>
        @else
            <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img"
                 fill="none">
                <path stroke="currentColor" stroke-width="2"
                      d="M2.56 10.346l5.12 3.694-1.955 5.978c-.225.688.568 1.261 1.157.836L12 17.159l5.12 3.695c.587.425 1.381-.148 1.155-.836l-1.954-5.978 5.118-3.694c.589-.425.286-1.352-.442-1.352H14.67l-1.955-5.978c-.225-.688-1.205-.688-1.43 0L9.33 8.994H3.003c-.728 0-1.03.927-.442 1.352z"
                      clip-rule="evenodd">
                </path>
            </svg>
        @endif
    </div>
@endfor