<!DOCTYPE html>

<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>VueJS Web Component Test</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">




</head>

<style>
    html, body {
        display: flex;
        align-items: center;
        flex-direction: column;
        margin-top: 16px;
        margin-bottom: 16px;
    }

    div#app {
        display: flex;
        flex-direction: column;
        width: 500px;
    }
    div#app .search-wrapper {
        position: relative;
    }
    div#app .search-wrapper label {
        position: absolute;
        font-size: 12px;
        color: rgba(0, 0, 0, 0.5);
        top: 8px;
        left: 12px;
        z-index: -1;
        transition: .15s all ease-in-out;
    }
    div#app .search-wrapper input {
        padding: 4px 12px;
        color: rgba(0, 0, 0, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.12);
        transition: .15s all ease-in-out;
        background: white;
    }
    div#app .search-wrapper input:focus {
        outline: none;
        transform: scale(1);
    }
    div#app .search-wrapper input:focus + label {
        font-size: 10px;
        transform: translateY(-24px) translateX(-12px);
    }
    div#app .search-wrapper input::-webkit-input-placeholder {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.5);
        font-weight: 100;
    }

    .user-list {
        flex: 1 100%;
        padding-top: 12px;
        border: 1px solid white;
    }

    .user-list__item {
        width: 100%;
        border-bottom: 2px solid white;
        box-sizing: border-box;
        position: relative;
        min-height: 60px;
        background: whitesmoke;
        padding: 16px;
        margin-bottom: 5px;
    }
    .user-list__item:hover {
        background: #cdcdcd;
    }
    .user-list__item:last-child {
        border: none;
    }

    .user-list__content {
        display: flex-start;
        align-items: center;
        padding-left: 58px;
        height: 40px;
        vertical-align: middle;
        width: 100%;
    }

    .user-list__image {
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        top: 0;
        left: 0;
        height: 40px;
        width: 40px;
        background: white;
    }
    .user-list__image img {
        width: 100%;
    }

    .user-list__avatar {
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        height: 40px;
        width: 40px;
        background: white;
    }

    .user-list__name {
        font-size: 18px;
    }

    .user-list__text {
        color: grey;
    }

    .user-list__status {
        width: 11px;
        height: 10px;
        background: grey;
        border-radius: 50%;
        float: right;
    }

    .user-list__status_online {
        background: green;
    }

    .user-list__status_offline {
        background: red;
    }


    .userIn{
        display: none;
    }

    input:checked + .user-list__item {
        box-shadow: 0 0 0 2px white, 0 0 0 5px #1b4b72;
    }



</style>

<body>

<div id="app">
    <searchable-list v-model="keyword" v-bind:list="filteredList" ><searchable-list>

</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>






<script>


    




    function _classCallCheck(instance, Constructor) {if (!(instance instanceof Constructor)) {throw new TypeError("Cannot call a class as a function");}}Vue.component('searchable-list', {
        props: { value: { required: true },
            list: { required: true } },
        template: '<div><searcher v-bind:value="value" v-on:input="emitInput" /><user-list v-bind:list="list" /></div>',
        methods: {
            emitInput: function emitInput(value) {
                this.$emit('input', value);
            } } });


    Vue.component('user-list', {
        props: ['list'],
        template: '<form method="post" action="{{url('addFollower')}}">@csrf<input name="picture" value={{$pic}} type="hidden"></input><div class="user-list" ><user-item v-for="post in list" v-bind:post="post"></user-item></div><button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button></form>' });

    Vue.component('user-item', {
        props: ['post'],
        template: '<label><input name="id[]" v-bind:value="post.id"  type="checkbox" class="userIn"><div class="user-list__item" ><div class="user-list__avatar"><img class="user-list__image" v-bind:src="post.avatar" /></div><div class="user-list__content"><div class="user-list__name">@{{ post.user }}</div><div class="user-list__text"><small> @{{ post.description }}</small></div></div></div></label>' });

    Vue.component('searcher', {
        props: { value: { required: true } },
        template: '<div class="search-wrapper"> <input type="text"  v-bind:value="value" placeholder="Search for a user..." v-on:input="updateValue($event.target.value)" /><label>User Search:</label</div>',
        methods: {
            updateValue: function updateValue(value) {
                this.$emit('input', value);
            } } });var



        Post =
            function Post(user, link, description, avatar,id) {_classCallCheck(this, Post);
                this.user = user;
                this.link = link;
                this.description = description;
                this.avatar = avatar;
                this.id = id;
            };


    var app = new Vue({
        el: "#app",
        data: {
            keyword: '',
            postList: [

                @forEach ($data as $item)
                new Post( '{{$item["name"]}}', 'https://aspgems.com/', 'I am ready to talk ', '../images/{{$item["avatar"]}}.jpg','{{$item["id"]}}' ),
                @endforeach

            ] },




        methods: {
            toggleOnOff: function toggleOnOff() {
                this.onOff = !this.onOff;
            } },

        computed: {
            filteredList: function filteredList() {var _this = this;
                return this.postList.filter(function (post) {
                    return post.user.toLowerCase().includes(_this.keyword.toLowerCase());
                });
            } } });
</script>


</body>

</html>
