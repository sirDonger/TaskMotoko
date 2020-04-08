<template>
    <div id="my-list" v-on:mousemove="moveAt" style="border: 1px solid black">
        <div v-for="(item, key) in items" ref="div" :id = 'key' v-on:mousedown.prop="myDrag" v-on:mouseup.prop="myDragStop" :name="key">
            <i class="fa fa-arrows-alt" style="border: 1px solid darkred" ></i>
            <a class="btn btn-outline-success btn-block" data-toggle="collapse" :href='"#"+key+"x"' role="button" onclick="e=>e.preventDefault()" :name="key" aria-expanded="false" :aria-controls='key+"x"'>
                Блок Template {{item}}>
            </a>
            <p class="collapse" :name='key' :id="key+'x'">
                Hello darkness my old friend {{item}}
            </p>
        </div>
    </div>
</template>
<style>

    ::selection {
        background: transparent;
    }
    ::-moz-selection {
        background: transparent;
    }
</style>
<script>
export default {
    data(){
        return {
            items: ['a', 'b', 'c', 'd'],
            list_corrds:[],
            i:0
        };
    },
    methods: {
        initCords(event) {
            this.$refs.div.forEach((elem, i) => {
                this.list_corrds[i] = elem.offsetTop + elem.offsetHeight;
                console.log(i);
            });

        },
        // Drag and drop  methods:
        myDrag(event) {
            event.preventDefault();

            this.draggableIndex = event.target.name;
            this.reorderedList = this.items;
            this.moveAt(event);
        },
        moveAt(event) {
            if (this.draggableIndex !== -1) {
                this.dragLeft = event.pageX - 16;
                this.dragTop = event.pageY - 16;
                this.i++;
            }
        },
        myDragStop(event) {
            this.initCords(event);
            if (this.draggableIndex === -1 || this.draggableIndex === undefined || this.i < 1) return;
            let i = 0;
            while (this.list_corrds[i] < this.dragTop) i++;
            let element = this.items.splice(this.draggableIndex, 1)[0];
            if (i === this.list_corrds.length)
                this.items.push(element);
            else
                this.items.splice(i, 0, element);
            //console.log('END:', JSON.stringify(this.list_corrds), JSON.stringify(this.items), this.draggableIndex, i, element, this.i);
            this.i = 0
            this.draggableIndex = -1;
            this.dragLeft = 0;
            this.dragTop = 0;
        },
        isDragging(key) {
            return this.draggableIndex === key;
        }
    }
}
</script>