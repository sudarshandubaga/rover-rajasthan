<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <input type="text" id="question" name="question" class="form-control" placeholder="Enter question"
                        value="{{ old('question') }}" required>
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea id="answer" name="answer" class="form-control text-editor" placeholder="Enter answer" rows="15">{{ old('answer') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
