<template>
    <div class="container">
        <div class="section">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="container content-tree">
            <div v-if="noComments" class="columns has-text-centered">
                <div class="column">
                    <h4 class="subtitle is-4">No Comments</h4>
                </div>
            </div>

            <CommentItem
                v-for="(item, index) in commentList[0]"
                :item="item"
                :index="index"
                :key="item.id"
                :commentList="commentList"
            />
        </div>
    </div>
</template>

<script>
    import CommentItem from "../helpers/CommentItem";

    export default {
        name: "Index",
        data() {
            return {
                commentList: [],
                noComments: false
            }
        },
        mounted() {
            axios.default.get('/api/comments')
                .then(response => {
                    if (response.data.error)
                        console.log('ERROR: ' + response.data.message);
                    else if (response.data.data.commentList === null)
                        this.noComments = true;
                    else
                        this.commentList = response.data.data.commentList;
                })
                .catch(e => {
                    console.log(e);
                });
        },
        components: {
            CommentItem
        }
    }
</script>

