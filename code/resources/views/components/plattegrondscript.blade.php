<?php
    use App\Models\Werkplek;
    
    $werkplek = Werkplek::get();
    $werkplekData = $werkplek->map(function ($item) {
        return [
            'name' => $item->name,
            'active' => $item->active,
        ];
    });
?>
<script>
    const werkplekData = @json($werkplekData);
    const wps = document.querySelectorAll('[id^="wp"], [id^="bio"]');
    wps.forEach(wp => {
        const id = wp.getAttribute('id');
        const wpData = werkplekData.find(wpData => wpData.name === id.replace(/[xy]/g, ''));
        if (wpData) {
            if (wpData.active == 1) {
                const defaultColor = wp.getAttribute('fill');
                wp.addEventListener("mouseenter", function() { wp.setAttribute('fill', '#ddd') });
                wp.addEventListener("mouseleave", function() { wp.setAttribute('fill', defaultColor) });
                wp.addEventListener("click", function() {
                    window.location.href = "werkplek?id=" + id;
                });
            } else {
                wp.setAttribute('fill', '#FF7E7E');
            };
        };
    });
</script>