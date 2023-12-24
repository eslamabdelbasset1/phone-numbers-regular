
<h1 class="font-bold text-5xl text-center mb-8">All Phone Numbers</h1>
<form id="formFilter" action="{{ route('filter-numbers') }}" method="get" class="grid grid-cols-3">
        <div class="form-group">
            <label for="Country" class="py-3 px-4 rounded-xl">Filter by Country: </label>
            <select name="country" id="country" class="py-3 px-8 bg-gray-100 rounded-xl">
                <option value="Cameroon">Cameroon</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Uganda">Uganda</option>
            </select>
        </div>
        <div class="col-md-4 state">
            <div class="form-group">
                <label for="Phone State" class="py-3 px-10 rounded-xl">Filter by State: </label>
                <select name="state" id="state" class="py-3 px-8 bg-gray-100 rounded-xl">
                    <option value="OK">Valid Phone Numbers</option>
                    <option value="NOK">InValid Phone Numbers</option>
                </select>
            </div>
        </div>
    <button type="submit" class="form-group w-40 py-4 px-5 bg-green-500 text-white rounded-xl">Filter</button>
</form>
<script>
    // $(document).ready(function() {
    //     $('#country').on('change', function(){
    //         $('#formFilter').submit()
    //         return false
    //     })
    //     $('#state').on('change', function(){
    //         $('#formFilter').submit()
    //         return false
    //     })
    // })
</script>
