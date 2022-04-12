<title>Character Count</title>
<link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .tags-look .tagify__dropdown__item{
  display: inline-block;
  border-radius: 3px;
  padding: .3em .5em;
  border: 1px solid #CCC;
  background: #F3F3F3;
  margin: .2em;
  font-size: .85em;
  color: black;
  transition: 0s;
}

.tags-look .tagify__dropdown__item--active{
  color: black;
}

.tags-look .tagify__dropdown__item:hover{
  background: lightyellow;
  border-color: gold;
}
</style>
<div class="hidden lg:block pb-12 relative" v-if="$route.path == '/photos' || $route.path == '/photodetail'">
    <header class="relative lg:fixed w-full top-0 z-50 bg-white border border-gray-200" data-v-4eecb332>
    <div class="wrap flex items-center relative h-12 px-10" data-v-4eecb332>
        <div class="logo flex-shrink-0 w-8 no-underline relative text-xl tracking-wide font-bold" data-v-4eecb332>
        Character-Checker
        </div>
    </div>
    </header>
</div>
    <section class="eats-wrapper relative w-11/12 lg:justify-center mx-auto">
        <div class="items-container flex mx-auto mt-8 w-full">
            <div class="ui_single-container relative lg:justify-center flex flex-no-wrap w-1/3 mr-20">

                <form class="w-full max-w-lg" method="post" action="{{ route('showHome') }}">
                    @csrf
                    <div class="w-full py-3">
                        <span class="flex items-center tracking-wide text-gray-700 text-base font-bold mb-2">
                        </span>
                    </div>

                    <div class=" -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="flex items-center tracking-wide text-gray-700 text-base font-bold mb-2"
                                for="grid-last-name" required>
                                Sentence
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="title" name="name" type="text" placeholder="Please Enter the Sentence">
                        </div>
                    </div>
                    <div class="-mx-3 mb-6">
                        <div class="w-full px-3">
                            <div id="personalised_fields" class="mb-3">
                                <div class="custom_field_err"></div>
                                <div class="field_wrapper">
                                        <div class="personalised_fields-ad">
                                            <label class="flex items-center tracking-wide text-gray-700 text-base font-bold mb-2"
                                                for="grid-last-name" required>Character Field</label></p>
                                            <div class="flex mb-6">
                                                <div class="form-group col-md-6">
                                                    <input
                                                        class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        type="text" name="char_name[]" value=""
                                                        placeholder="Character Name" />
                                                        <input
                                                        class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        type="text" name="char_count[]" value=""
                                                        placeholder="Character Count" />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <a href="javascript:void(0);" class="add_button" title="Add field">Add more fields <img src="{{ asset('assets/image/add-icon.png') }}" /></a>
                            </div>
                        </div>
                    </div>

                    <button class="bg-purple-500 hover:bg-purple-700 font-bold text-white py-2 px-4 rounded mr-3">
                        Submit
                    </button>
                </form>

            </div>
            @if($newword)
            <div class="flex flex-col flex-1">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-6">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Sentence
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $input }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Test Case :
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $test }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Result
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $newword }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <td scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Occurence
                                    </td>
                                        <td scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $occur }}
                                </td>
                                    </tr>
                                </thead>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            @endif




        </div>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var x = 1; //Initial field counter is 1
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    function addInput() {

        if (x < maxField) {
            var fieldHTML ='<div id="personalised_fields" class="mb-3"><div class="custom_field_err"></div><div class="field_wrapper"><div class="personalised_fields-ad"><label class="flex items-center tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name" required>Character Field</label></p><div class="flex mb-6"><div class="form-group col-md-6"><input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="char_name[]" value="" placeholder="Character Name" /><input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="char_count[]" value="" placeholder="Character Count" /></div></div></div> </div></div>'; //New input field html
            x++; //Increment field counter
            $('.field_wrapper').append(fieldHTML); //Add field html
        } else {
            alert('You have reached maximum limit of 10 fields.')
            return false;
        }
    }

    function changeType(text, select, value) {
        var selectId = 'type' + value;
        var value = $("#" + selectId).val();
        if (value == 'select') {
            $('#' + text).hide();
            $('#' + select).show();
        } else {
            $('#' + select).hide();
            $('#' + text).show();
        }
    }
    $(document).ready(function() {
        $(".add_button").on('click', addInput);
    });
</script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').html('');
        }, 3000);
    });
    </script>
@section('scripts')
@endsection
