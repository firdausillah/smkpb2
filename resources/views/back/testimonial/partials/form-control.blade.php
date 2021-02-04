                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="name" value="{{ old('name ') ?? $testimonial->name }}" id="name" class="form-control">
                                        @error('name')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="{{ old('email ') ?? $testimonial->email }}" id="email" class="form-control">
                                        @error('email')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label> <br>
                                        <img src="{{ asset('storage/'.$testimonial->image) }}" height="100px" alt="{{ $testimonial->name }}">
                                        <input type="file" name="image" id="image">
                                        @error('image')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Testimoni</label>
                                        <textarea name="testimoni" id="ckeditor" class="ckeditor form-control">{{ old('testimoni') ?? $testimonial->testimoni }}</textarea>
                                        @error('testimoni')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jurusan</label>
                                        <select name="grade" id="grade" class="form-control">
                                            <option value="">Umum</option>
                                            @foreach ($grades as $grade)
                                            <option {{ $testimonial->grades()->find($grade->id) ? 'selected' : '' }} value="{{ $grade->id }}">{{ $grade->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('grade')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <!-- <input type="text" name="status" value="{{ old('status ') ?? $testimonial->status }}" id="status" class="form-control"> -->
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status') ?? $testimonial->status == '1' ? 'selected' : ''}}>Aktif</option>
                                            <option value="0" {{ old('status') ?? $testimonial->status == '0' ? 'selected' : ''}}>Nonaktif</option>
                                        </select>
                                        @error('status')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('testimonial') }}" class="btn btn-secondary">Kembali</a>
                                    </div>