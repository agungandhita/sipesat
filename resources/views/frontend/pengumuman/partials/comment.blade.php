<div class="group/comment">
    <div class="flex gap-4 {{ $level > 0 ? 'ml-8 md:ml-12 mt-6' : '' }}">
        <!-- Avatar -->
        <div class="flex-shrink-0">
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-2xl {{ isset($comment->user) && $comment->user->role == 'admin' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-500' }} flex items-center justify-center font-bold text-lg shadow-sm">
                {{ $comment->user ? substr($comment->user->nama, 0, 1) : 'A' }}
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 min-w-0">
            <div class="bg-white border border-gray-100 rounded-3xl p-5 md:p-6 transition-all duration-200 hover:shadow-md group-hover/comment:border-gray-200">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <h4 class="text-sm font-bold text-gray-900 truncate">
                            {{ $comment->user->nama ?? 'Admin' }}
                        </h4>
                        @if(isset($comment->user) && $comment->user->role == 'admin')
                            <span class="px-2 py-0.5 text-[10px] bg-indigo-100 text-indigo-600 font-bold uppercase tracking-wider rounded-md">Admin</span>
                        @endif
                    </div>
                    <time class="text-[11px] font-medium text-gray-400 uppercase tracking-wider">
                        {{ $comment->created_at->diffForHumans() }}
                    </time>
                </div>
                
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    {{ $comment->isi_komentar }}
                </p>

                <div class="flex items-center gap-4">
                    @auth
                        @if($level < 2)
                            <button onclick="toggleReplyForm({{ $comment->komentar_id }})"
                                    class="text-xs font-bold text-indigo-600 hover:text-indigo-700 transition-colors flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                                Balas
                            </button>
                        @endif

                        @if (auth()->id() == $comment->user_id || auth()->user()->role == 'admin')
                            <form action="{{ route('hapus.komentar', $comment->komentar_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-600 transition-colors flex items-center gap-1.5"
                                        onclick="return confirm('Hapus komentar ini?')">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>

                <!-- Reply Form -->
                @auth
                    <div id="reply-form-{{ $comment->komentar_id }}" class="hidden mt-6 pt-6 border-t border-gray-50">
                        <form action="{{ route('komentar.store', $informasi->informasi_id) }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->komentar_id }}">
                            <textarea name="isi_komentar" rows="3"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 placeholder:text-gray-400"
                                placeholder="Tulis balasan..." required></textarea>
                            <div class="flex gap-2">
                                <button type="submit"
                                    class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl transition-all">
                                    Kirim Balasan
                                </button>
                                <button type="button" onclick="toggleReplyForm({{ $comment->komentar_id }})"
                                    class="px-5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold rounded-xl transition-all">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                @endauth
            </div>

            <!-- Nested Replies -->
            @if($comment->replies->count() > 0)
                <div class="space-y-2">
                    @foreach($comment->replies as $reply)
                        @include('frontend.pengumuman.partials.comment', ['comment' => $reply, 'level' => $level + 1])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

@once
    @push('scripts')
    <script>
    function toggleReplyForm(commentId) {
        const replyForm = document.getElementById(`reply-form-${commentId}`);
        if (replyForm) {
            if (replyForm.classList.contains('hidden')) {
                document.querySelectorAll('[id^="reply-form-"]').forEach(form => form.classList.add('hidden'));
                replyForm.classList.remove('hidden');
                replyForm.querySelector('textarea').focus();
            } else {
                replyForm.classList.add('hidden');
            }
        }
    }
    </script>
    @endpush
@endonce
