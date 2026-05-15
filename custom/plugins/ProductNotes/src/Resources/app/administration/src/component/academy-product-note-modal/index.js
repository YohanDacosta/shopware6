import template from './product-note-modal.html.twig';
import './product-note-modal.scss';

const { Component } = Shopware;

Component.register('product-note-modal', {
    template,

    props: {
        note: {
            type: Object,
            required: true
        }
    },

    computed: {
        modalTitle() {
            return this.note.isNew() 
                ? this.$t('product-notes.detail.buttonAddNote')
                : this.$t('product-notes.detail.buttonEdit');
        }
    },

    methods: {
        onSave() {
            this.$emit('save');
        },

        onClose() {
            this.$emit('close');
        }
    }
}); 