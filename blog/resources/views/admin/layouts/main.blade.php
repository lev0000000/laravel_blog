<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE v4 | Dashboard</title>

    <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
    <script>
        (() => {
            'use strict';
            const root = document.documentElement;

            // Applications with their own theming opt out of AdminLTE's color mode
            // entirely, here as well as in the bundle.
            if (root.getAttribute('data-lte-color-mode') === 'off') {
                return;
            }

            const STORAGE_KEY = 'lte-theme';
            let stored = null;
            try {
                stored = localStorage.getItem(STORAGE_KEY);
            } catch {
                // localStorage may be unavailable (private mode, sandboxed iframe).
            }
            // Mirror the precedence in color-mode.ts: the visitor's stored choice
            // wins, then a theme this page declared itself, then the OS preference.
            const authored = root.getAttribute('data-bs-theme');
            let resolved = 'light';
            if (stored === 'dark' || stored === 'light') {
                resolved = stored;
            } else if (authored === 'dark' || authored === 'light') {
                resolved = authored;
            } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
                resolved = 'dark';
            }
            root.setAttribute('data-bs-theme', resolved);
            root.style.colorScheme = resolved;
            // Flag values computed here, so the bundle does not mistake them for a
            // theme the page declared and stop following the OS preference.
            if (resolved !== authored) {
                root.setAttribute('data-lte-theme-resolved', '');
            }
        })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a free Bootstrap 5 admin dashboard template with almost 50 example pages, built with vanilla JS and designed with accessibility in mind." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('/css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
        media="print"
        onload="this.media = 'all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('/css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- jsvectormap -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
        crossorigin="anonymous" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">

        @include('admin.includes.sidebar-top')
        @include('admin.includes.sidebar')
        @yield('content')
        @include('admin.includes.footer')

    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

            // Disable OverlayScrollbars on mobile devices to prevent touch interference
            const isMobile = window.innerWidth <= 992;

            if (
                sidebarWrapper &&
                OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
                !isMobile
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->

    <!--begin::Color Mode Toggle-->
    <!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
     module (since 4.1) — no page script needed. Only the no-flash snippet
     in <head> stays inline, because it must run before first paint. -->
    <!--end::Color Mode Toggle-->

    <!-- OPTIONAL SCRIPTS -->

    <!-- sortablejs -->
    <script
        src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
        crossorigin="anonymous"></script>
    <!-- sortablejs -->
    <script>
        new Sortable(document.querySelector('.connectedSortable'), {
            group: 'shared',
            handle: '.card-header',
        });

        const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = 'move';
        });
    </script>
    <!-- Chart.js + AdminLTE chart theme -->
    <!--begin::Third Party Plugin(Chart.js)-->
    <script
        src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"
        integrity="sha256-SERKgtTty1vsDxll+qzd4Y2cF9swY9BCq62i9wXJ9Uo="
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(Chart.js)-->
    <!--begin::Chart.js theme preset-->
    <script>
        // Styles every Chart.js chart on the page from AdminLTE's CSS variables —
        // font, text, gridlines, tooltip and legend — and keeps them in step with the
        // colour mode (ColorMode, the OS in auto mode, or your own code) and with
        // `dir="rtl"`. Canvas can't read CSS, so the values are resolved here and
        // re-applied to every chart whenever <html data-bs-theme> or dir changes.
        (() => {
            'use strict';
            const {
                Chart
            } = globalThis;
            if (!Chart) {
                return;
            }

            const root = document.documentElement;
            const cssVar = (name, fallback = '') =>
                getComputedStyle(root).getPropertyValue(name).trim() || fallback;

            // "#0d6efd" (or "#06f") + 0.3 -> "rgba(13, 110, 253, 0.3)"; anything else is returned as is.
            const alpha = (color, opacity) => {
                let hex = String(color).trim().replace(/^#/, '');
                if (!/^[\da-f]{3}([\da-f]{3})?$/i.test(hex)) {
                    return color;
                }

                if (hex.length === 3) {
                    hex = [...hex].map((c) => c + c).join('');
                }

                const [r, g, b] = [0, 2, 4].map((i) => Number.parseInt(hex.slice(i, i + 2), 16));
                return `rgba(${r}, ${g}, ${b}, ${opacity})`;
            };

            // Scriptable backgroundColor for area charts: the line colour fading to transparent.
            const areaFill =
                (color, from = 0.35, to = 0) =>
                (context) => {
                    const {
                        ctx,
                        chartArea
                    } = context.chart;
                    if (!chartArea) {
                        return alpha(color, from);
                    }

                    const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                    gradient.addColorStop(0, alpha(color, from));
                    gradient.addColorStop(1, alpha(color, to));
                    return gradient;
                };

            // The theme colours currently in Chart.defaults.
            let applied = [];

            const apply = () => {
                const text = cssVar('--bs-secondary-color', '#6c757d');
                const body = cssVar('--bs-body-color', '#212529');
                const surface = cssVar('--bs-body-bg', '#fff');
                const grid = `rgba(${cssVar('--bs-emphasis-color-rgb', '0, 0, 0')}, 0.08)`;
                const rtl = root.getAttribute('dir') === 'rtl';
                const d = Chart.defaults;
                applied = [text, grid];

                d.font.family = cssVar('--bs-body-font-family', d.font.family);
                d.font.size = 12;
                d.color = text;
                d.borderColor = grid;
                d.maintainAspectRatio = false;

                d.scale.grid.color = grid;
                d.scale.border.color = grid;
                d.scale.ticks.padding = 8;
                // Value axes float, category axes keep only their baseline.
                d.set('scales.linear', {
                    border: {
                        display: false
                    }
                });
                d.set('scales.category', {
                    grid: {
                        display: false
                    }
                });

                d.elements.line.borderWidth = 2;
                d.elements.point.radius = 0;
                d.elements.point.hoverRadius = 5;
                d.elements.point.hitRadius = 8;
                d.elements.point.hoverBorderWidth = 2;
                d.elements.point.borderColor = surface;
                d.elements.bar.borderRadius = 4;
                d.elements.arc.borderColor = surface;
                d.elements.arc.borderWidth = 2;

                const {
                    legend,
                    tooltip
                } = d.plugins;
                legend.position = 'bottom';
                legend.rtl = rtl;
                Object.assign(legend.labels, {
                    color: body,
                    usePointStyle: true,
                    pointStyle: 'circle',
                    boxWidth: 8,
                    boxHeight: 8,
                    padding: 16,
                });

                Object.assign(tooltip, {
                    rtl,
                    backgroundColor: surface,
                    borderColor: cssVar('--bs-border-color', '#dee2e6'),
                    borderWidth: 1,
                    titleColor: cssVar('--bs-emphasis-color', '#000'),
                    bodyColor: body,
                    titleFont: {
                        weight: '600'
                    },
                    padding: 10,
                    cornerRadius: 6,
                    caretSize: 5,
                    boxPadding: 4,
                    usePointStyle: true,
                });

                // Line and bar charts share one tooltip per x value, like a dashboard should.
                for (const type of ['line', 'bar']) {
                    Chart.overrides[type].interaction = {
                        mode: 'index',
                        intersect: false
                    };
                }
            };

            // Chart.js copies the scale defaults (tick, grid, border and title colours)
            // into each chart's config when the chart is created, so new defaults alone
            // never reach an existing chart's axes. Drop the copies that still hold the
            // previous theme's colours; update() then copies the new ones in. Colours a
            // chart set for itself are left alone.
            const forgetThemeColors = (options, stale) => {
                for (const [key, value] of Object.entries(options)) {
                    if (value && typeof value === 'object' && !Array.isArray(value)) {
                        forgetThemeColors(value, stale);
                    } else if (/color$/i.test(key) && stale.includes(value)) {
                        delete options[key];
                    }
                }
            };

            const refresh = () => {
                const stale = applied;
                apply();
                for (const chart of Object.values(Chart.instances)) {
                    forgetThemeColors(chart.config.options.scales || {}, stale);
                    chart.update('none');
                }
            };

            apply();
            new MutationObserver(refresh).observe(root, {
                attributes: true,
                attributeFilter: ['data-bs-theme', 'dir'],
            });
            // The web font may arrive after the first draw; redraw so labels use it.
            document.fonts?.addEventListener('loadingdone', refresh);

            // Helpers for the page's own chart code.
            // eslint-disable-next-line unicorn/no-global-object-property-assignment
            globalThis.lteChartTheme = {
                cssVar,
                alpha,
                areaFill,
                refresh
            };
        })();
    </script>
    <!--end::Chart.js theme preset-->

    <!-- Chart.js -->
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        const {
            areaFill
        } = globalThis.lteChartTheme;

        new Chart(document.querySelector('#revenue-chart'), {
            type: 'line',
            data: {
                labels: ["Jan '23", "Feb '23", "Mar '23", "Apr '23", "May '23", "Jun '23", "Jul '23"],
                datasets: [{
                        label: 'Digital Goods',
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: '#0d6efd',
                        backgroundColor: areaFill('#0d6efd'),
                        pointBackgroundColor: '#0d6efd',
                        fill: true,
                        tension: 0.4,
                    },
                    {
                        label: 'Electronics',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        borderColor: '#20c997',
                        backgroundColor: areaFill('#20c997'),
                        pointBackgroundColor: '#20c997',
                        fill: true,
                        tension: 0.4,
                    },
                ],
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            title: ([item]) =>
                                `${new Date(2023, item.dataIndex).toLocaleString('en', { month: 'long' })} 2023`,
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
    <!-- jsvectormap -->
    <script
        src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
        integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
        integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
        crossorigin="anonymous"></script>
    <!-- jsvectormap -->
    <script>
        // World map by jsVectorMap
        new jsVectorMap({
            selector: '#world-map',
            map: 'world',
        });

        // Sparkline charts
        const sparkline = (selector, data) =>
            new Chart(document.querySelector(selector), {
                type: 'line',
                data: {
                    labels: data.map((value, index) => index + 1),
                    datasets: [{
                        data,
                        borderColor: '#DCE6EC',
                        backgroundColor: 'rgba(220, 230, 236, 0.3)',
                        pointBackgroundColor: '#DCE6EC',
                        fill: true,
                    }, ],
                },
                options: {
                    layout: {
                        padding: {
                            top: 2
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            displayColors: false,
                            callbacks: {
                                title: () => ''
                            },
                        },
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false,
                            min: 0
                        },
                    },
                },
            });

        sparkline('#sparkline-1', [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021]);
        sparkline('#sparkline-2', [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921]);
        sparkline('#sparkline-3', [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21]);
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>