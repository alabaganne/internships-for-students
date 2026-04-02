import { Inertia } from '@inertiajs/inertia';

export default {
    methods: {
        toggleLike(internship) {
            Inertia.post(route('likes.store', internship.id), {}, {
                preserveScroll: true,
            });
        }
    }
};
