<div class="flex space-x-4 p-4 bg-gray-50 rounded-lg {{ $level > 0 ? 'ml-8 mt-4' : '' }}">
    <div class="flex-shrink-0">
        <div class="w-10 h-10 rounded-full {{ isset($comment->user) && $comment->user->role == 'admin' ? 'bg-red-100' : 'bg-blue-100' }} flex items-center justify-center">
            <span class="{{ isset($comment->user) && $comment->user->role == 'admin' ? 'text-red-600' : 'text-blue-600' }} font-semibold">
                {{ $comment->user ? substr($comment->user->nama, 0, 1) : 'A' }}
            </span>
        </div>
    </div>
    <div class="flex-1">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center space-x-2">
                <h4 class="text-sm font-semibold text-gray-900">
                    {{ $comment->user->nama ?? 'Admin' }}
                </h4>
                @if(isset($comment->user) && $comment->user->role == 'admin')
                    <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-full">Admin</span>
                @endif
            </div>
            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="text-gray-700 mb-3">{{ $comment->isi_komentar }}</p>

        <div class="flex items-center space-x-4">
            @auth
                <!-- Reply Button -->
                @if($level < 2)
                    <button onclick="toggleReplyForm({{ $comment->komentar_id }})"
                            class="text-xs text-blue-600 hover:underline">
                        Balas
                    </button>
                @endif

                <!-- Delete Button -->
                @if (auth()->id() == $comment->user_id || auth()->user()->role == 'admin')
                    <!-- Form Hapus Komentar -->
                    <form action="{{ route('hapus.komentar', $comment->komentar_id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-600 hover:underline"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
                            Hapus
                        </button>
                    </form>
                @endif
            @endauth
        </div>

        <!-- Reply Form -->
        @auth
            <div id="reply-form-{{ $comment->komentar_id }}" class="hidden mt-4 bg-white p-4 rounded border">
                <form action="{{ route('komentar.store', $informasi->informasi_id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $comment->komentar_id }}">
                    <div class="mb-3">
                        <textarea name="isi_komentar" rows="3"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Tulis balasan Anda..." required></textarea>
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit"
                            class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition duration-200">
                            Kirim Balasan
                        </button>
                        <button type="button" onclick="toggleReplyForm({{ $comment->komentar_id }})"
                            class="px-3 py-1 bg-gray-300 text-gray-700 text-sm rounded hover:bg-gray-400 transition duration-200">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        @endauth

        <!-- Replies -->
        @if($comment->replies->count() > 0)
            <div class="mt-4 space-y-4">
                @foreach($comment->replies as $reply)
                    @include('frontend.pengumuman.partials.comment', ['comment' => $reply, 'level' => $level + 1])
                @endforeach
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
function toggleReplyForm(commentId) {
    const replyForm = document.getElementById(`reply-form-${commentId}`);

    if (replyForm) {
        if (replyForm.classList.contains('hidden')) {
            // Hide all other reply forms first
            hideAllReplyForms();

            // Show current reply form
            replyForm.classList.remove('hidden');

            // Focus on textarea
            const textarea = replyForm.querySelector('textarea[name="isi_komentar"]');
            if (textarea) {
                textarea.focus();
            }
        } else {
            replyForm.classList.add('hidden');

            // Clear textarea
            const textarea = replyForm.querySelector('textarea[name="isi_komentar"]');
            if (textarea) {
                textarea.value = '';
            }
        }
    }
}

function hideAllReplyForms() {
    const allReplyForms = document.querySelectorAll('[id^="reply-form-"]');
    allReplyForms.forEach(form => {
        form.classList.add('hidden');

        const textarea = form.querySelector('textarea[name="isi_komentar"]');
        if (textarea) {
            textarea.value = '';
        }
    });
}
</script>
@endpush
