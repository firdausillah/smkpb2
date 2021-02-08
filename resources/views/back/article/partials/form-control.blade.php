                                    <input type="hidden" name="writer" value="{{ old('writer') ?? Auth::user()->name }}">
                                    <input type="hidden" name="view" value="{{ old('view') ?? null }}">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" name="title" value="{{ old('title ') ?? $article->title }}" id="title" class="form-control">
                                        @error('title')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tumbnail</label> <br>
                                        <img src="{{ asset('storage/'.$article->image) }}" height="100px" alt="{{ $article->title }}">
                                        <input type="file" name="image" id="image">
                                        @error('image')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="ckeditor" class="ckeditor form-control">{{ old('description') ?? $article->description }}</textarea>
                                        @error('description')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                        <select name="grade" id="grade" class="form-control">
                                            <option value="">Umum</option>
                                            @foreach ($grades as $grade)
                                                <option {{ $article->grades()->find($grade->id) ? 'selected' : '' }} value="{{ $grade->id }}">{{ $grade->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('grade')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tags</label>
                                        <input type="text" name="tags" id="tags" class="form-control" placeholder="Pisahkan dengan koma" value="{{ old('tags ') ?? $article->tags }}">
                                        @error('tags')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('article') }}" class="btn btn-secondary">Kembali</a>
                                    </div>