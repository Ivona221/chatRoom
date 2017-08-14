<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>

        <ul>
            <button @click="redirect(user.id)" v-for="user in users">
                {{ user.name }}
            </button>
        </ul>



    </div>
</template>



<script>
    export default {
        props: ['user', 'receiver','users'],

        data() {
            return {
                newMessage: '',

            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage,
                    receiver: this.receiver,
                    users:this.users
                });
                this.newMessage = ''

            },

            redirect(id){

                window.location.href = 'http://127.0.0.1:8000/chat?id='+id;
            }
        }
    }



</script>