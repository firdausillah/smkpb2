                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="name" value="{{ old('name ') ?? $profile->name }}" id="name" class="form-control">
                                                @error('name')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Logo</label> <br>
                                                <img src="{{ asset('storage/'.$profile->logo) }}" height="100px" alt="{{ $profile->title }}">
                                                <input type="file" name="logo" id="logo">
                                                @error('logo')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Salam</label>
                                                <textarea name="greeting" id="ckeditor" class="ckeditor form-control">{{ old('greeting') ?? $profile->greeting }}</textarea>
                                                @error('greeting')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <input type="text" name="address" value="{{ old('address ') ?? $profile->address }}" id="address" class="form-control">
                                                @error('address')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Contact Person 1</label>
                                                <input type="number" name="contact1" value="{{ old('contact1 ') ?? $profile->contact1 }}" id="contact1" class="form-control">
                                                @error('contact1')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Contact Person 2</label>
                                                <input type="number" name="contact2" value="{{ old('contact2 ') ?? $profile->contact2 }}" id="contact2" class="form-control">
                                                @error('contact2')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" value="{{ old('email ') ?? $profile->email }}" id="email" class="form-control">
                                                @error('email')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Social Media 1</label>
                                                <input type="text" name="socialmedia1" value="{{ old('socialmedia1 ') ?? $profile->socialmedia1 }}" id="socialmedia1" class="form-control">
                                                @error('socialmedia1')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            <div class="form-group">
                                                <label for="">Social Media 2</label>
                                                <input type="text" name="socialmedia2" value="{{ old('socialmedia2 ') ?? $profile->socialmedia2 }}" id="socialmedia2" class="form-control">
                                                @error('socialmedia2')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Social Media 3</label>
                                                <input type="text" name="socialmedia3" value="{{ old('socialmedia3 ') ?? $profile->socialmedia3 }}" id="socialmedia3" class="form-control">
                                                @error('socialmedia3')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('profile') }}" class="btn btn-secondary">Kembali</a>
                                    </div>