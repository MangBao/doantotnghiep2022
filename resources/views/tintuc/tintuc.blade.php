@extends('layouts.landing')
@section('contentHome')
    <div class="h-10"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full px-4 z-10 ">
                <div
                    class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    <article>
                        <header class="pt-6 lg:pb-10">
                            <div class="space-y-1 text-center">
                                <dl class="space-y-10">
                                    <div>
                                        <dt class="sr-only">Published on</dt>
                                        <dd class="text-base leading-6 font-medium text-gray-500">
                                            {{date('l, M d, Y', strtotime($tts->created_at))}}
                                        </dd>
                                        {{-- Wednesday, May 13, 2020 --}}
                                    </div>
                                </dl>
                                <div>
                                    <h1
                                        class="text-3xl leading-9 font-extrabold text-gray-900 dark:text-gray-300 tracking-tight sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">
                                        {{ $tts->title }}</h1>
                                    {{-- GraphQL Schema Stitching --}}
                                </div>
                            </div>
                        </header>
                        <div class="divide-y lg:divide-y-0 divide-gray-200 lg:grid lg:grid-cols-4 lg:col-gap-6 pb-16 lg:pb-20 px-6"
                            style="grid-template-rows: auto 1fr;">
                            <dl class="pt-6 pb-10 lg:pt-11 lg:border-b lg:border-gray-200">
                                <dt class="sr-only">Author</dt>
                                <dd>
                                    <ul
                                        class="flex justify-center lg:block space-x-8 sm:space-x-12 lg:space-x-0 lg:space-y-8">
                                        <li class="flex space-x-2">
                                            <div class="w-10 h-10 rounded-full gatsby-image-wrapper"
                                                style="position: relative; overflow: hidden;">
                                                <div aria-hidden="true" style="width: 100%; padding-bottom: 100%;"></div>
                                                <img aria-hidden="true"
                                                    src="data:image/jpeg;base64,/9j/2wBDABALDA4MChAODQ4SERATGCgaGBYWGDEjJR0oOjM9PDkzODdASFxOQERXRTc4UG1RV19iZ2hnPk1xeXBkeFxlZ2P/2wBDARESEhgVGC8aGi9jQjhCY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2P/wgARCAAUABQDASIAAhEBAxEB/8QAGQABAAMBAQAAAAAAAAAAAAAAAAMEBQEG/8QAFgEBAQEAAAAAAAAAAAAAAAAAAgEA/9oADAMBAAIQAxAAAAGzPmaBVh1T5m2ZQin/xAAcEAACAgIDAAAAAAAAAAAAAAABAgMRABASExT/2gAIAQEAAQUC7KVC2rsRaU8mnYqPTKM//8QAFREBAQAAAAAAAAAAAAAAAAAAEEH/2gAIAQMBAT8BIf/EABURAQEAAAAAAAAAAAAAAAAAABBB/9oACAECAQE/ASn/xAAdEAACAgEFAAAAAAAAAAAAAAAAIQECEBEiMUGB/9oACAEBAAY/AlDN2nme8MrFUcn/xAAcEAEAAwACAwAAAAAAAAAAAAABABEhEEExUXH/2gAIAQEAAT8ha+jaCM8dRUQNtUzQLqu+HA0REva+4ZKv0n//2gAMAwEAAgADAAAAELTYQ//EABYRAQEBAAAAAAAAAAAAAAAAABEBEP/aAAgBAwEBPxAg5Mf/xAAYEQEAAwEAAAAAAAAAAAAAAAABABARMf/aAAgBAgEBPxBcaeJk/8QAHBABAAMAAgMAAAAAAAAAAAAAAQARIUFRMWGh/9oACAEBAAE/ELwFkGi+2DgdGNvsTcAmVgj6jdem7dcyyNTYVXEXQAyXRhsG8JyKz//Z"
                                                    alt=""
                                                    style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 0;">
                                                <picture>
                                                    <source srcset="/images/{{ $tts->avatar }} 150w,
                                                                    /images/{{ $tts->avatar }} 300w,
                                                                    /images/{{ $tts->avatar }} 600w,
                                                                    /images/{{ $tts->avatar }} 741w"
                                                        sizes="(max-width: 600px) 100vw, 600px">
                                                    <img sizes="(max-width: 600px) 100vw, 600px" srcset="/images/{{ $tts->avatar }} 150w,
                                                                    /images/{{ $tts->avatar }} 300w,
                                                                    /images/{{ $tts->avatar }} 600w,
                                                                    /images/{{ $tts->avatar }} 741w"
                                                        src="/images/{{ $tts->avatar }}" alt="" loading="lazy"
                                                        style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 1; transition: none 0s ease 0s;">
                                                </picture><noscript>
                                                    <picture>
                                                        <source srcset="/images/{{ $tts->avatar }} 150w,
                                                                        /images/{{ $tts->avatar }} 300w,
                                                                        /images/{{ $tts->avatar }} 600w,
                                                                        /images/{{ $tts->avatar }} 741w"
                                                            sizes="(max-width: 600px) 100vw, 600px" /><img loading="lazy"
                                                            sizes="(max-width: 600px) 100vw, 600px" srcset="/images/{{ $tts->avatar }} 150w,
                                                                        /images/{{ $tts->avatar }} 300w,
                                                                        /images/{{ $tts->avatar }} 600w,
                                                                        /images/{{ $tts->avatar }} 741w"
                                                            src="/images/{{ $tts->avatar }}" alt=""
                                                            style="position:absolute;top:0;left:0;opacity:1;width:100%;height:100%;object-fit:cover;object-position:center" />
                                                    </picture>
                                                </noscript>
                                            </div>
                                            <dl class="flex-1 text-sm font-medium leading-5">
                                                <dt class="sr-only">Name</dt>
                                                <dd class="text-gray-900 dark:text-gray-300">{{ $tts->name }}</dd>
                                                <dt class="sr-only">Role</dt>
                                                <dd class="text-gray-500">{{ $tts->role_name }}</dd>
                                            </dl>
                                        </li>
                                    </ul>
                                </dd>
                            </dl>
                            <div class="divide-y divide-gray-200 lg:pb-0 lg:col-span-3 lg:row-span-2">
                                {{-- heading1 --}}
                                <div class="mb-8 rounded gatsby-image-wrapper"
                                    style="position: relative; overflow: hidden;">
                                    <div aria-hidden="true" style="width: 100%; padding-bottom: 56%;"></div><img
                                        aria-hidden="true"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAALCAYAAAB/Ca1DAAAACXBIWXMAAAsSAAALEgHS3X78AAABQElEQVQoz42T63KCMBCFqVYxCok6RMVLZwRxiuIFtUWnnfb9n+p0EwGh1eqPM5vMbr7k7ILB+AyZGtwvRF/Hhn1FaZ7l6wvDyGG2Kkij3ge0n6PJ/4pRrmGnFxfOlIBFcJOHkL0EzvAE4aSS2fpIStASYQl0E6hsWO0Y42kCHoR46i/x7EaoDlRcoeouwdwDeCe+D8ws8M4OrVECGX5DBB+ojdaoDVcwJzHqkw3Y8ADR2V9s337huemiu4fZj9F+/YLtn2B0pzBkAMNR8nVOdA+FAd0DqtsHO9gz6lnwCXMca8uV/oLAc5iUexB4HgqnHlqTN1jemmxGqJHN+ssWFVcBPdQHW+3iYaAlIojeCS1JUPl+EU1eifeOuubfoagG598jRYsv6KWbK1oTbFGqzc7+eqGfFhT/Cu+GyrWsYPsH0IoUi8idLGEAAAAASUVORK5CYII="
                                        alt=""
                                        style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 0;">
                                    <picture>
                                        <source srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                /images/tintuc/{{ $tts->image1 }} 300w,
                                                                /images/tintuc/{{ $tts->image1 }} 600w,
                                                                /images/tintuc/{{ $tts->image1 }} 900w,
                                                                /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                /images/tintuc/{{ $tts->image1 }} 1280w"
                                            sizes="(max-width: 600px) 100vw, 600px">
                                        <img sizes="(max-width: 600px) 100vw, 600px"
                                            srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                                                    /images/tintuc/{{ $tts->image1 }} 300w,
                                                                                                    /images/tintuc/{{ $tts->image1 }} 600w,
                                                                                                    /images/tintuc/{{ $tts->image1 }} 900w,
                                                                                                    /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                                                    /images/tintuc/{{ $tts->image1 }} 1280w"
                                            src="/images/tintuc/{{ $tts->image1 }}" alt="" loading="lazy"
                                            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 1; transition: none 0s ease 0s;">
                                    </picture><noscript>
                                        <picture>
                                            <source srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                /images/tintuc/{{ $tts->image1 }} 300w,
                                                                /images/tintuc/{{ $tts->image1 }} 600w,
                                                                /images/tintuc/{{ $tts->image1 }} 900w,
                                                                /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                /images/tintuc/{{ $tts->image1 }} 1280w"
                                                sizes="(max-width: 600px) 100vw, 600px" /><img loading="lazy"
                                                sizes="(max-width: 600px) 100vw, 600px"
                                                srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                                                                        /images/tintuc/{{ $tts->image1 }} 300w,
                                                                                                                        /images/tintuc/{{ $tts->image1 }} 600w,
                                                                                                                        /images/tintuc/{{ $tts->image1 }} 900w,
                                                                                                                        /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                                                                        /images/tintuc/{{ $tts->image1 }} 1280w"
                                                src="/images/tintuc/{{ $tts->image1 }}" alt=""
                                                style="position:absolute;top:0;left:0;opacity:1;width:100%;height:100%;object-fit:cover;object-position:center" />
                                        </picture>
                                    </noscript>
                                </div>
                                <div class="prose max-w-none pt-10 pb-8">
                                    {{$tts->content1}}
                                </div>

                                @if ($tts->heading2 != null || $tts->content2 != null)
                                    {{-- heading2 --}}
                                    <div class="mb-8 rounded gatsby-image-wrapper"
                                        style="position: relative; overflow: hidden;">
                                        <div aria-hidden="true" style="width: 100%; padding-bottom: 56%;"></div><img
                                            aria-hidden="true"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAALCAYAAAB/Ca1DAAAACXBIWXMAAAsSAAALEgHS3X78AAABQElEQVQoz42T63KCMBCFqVYxCok6RMVLZwRxiuIFtUWnnfb9n+p0EwGh1eqPM5vMbr7k7ILB+AyZGtwvRF/Hhn1FaZ7l6wvDyGG2Kkij3ge0n6PJ/4pRrmGnFxfOlIBFcJOHkL0EzvAE4aSS2fpIStASYQl0E6hsWO0Y42kCHoR46i/x7EaoDlRcoeouwdwDeCe+D8ws8M4OrVECGX5DBB+ojdaoDVcwJzHqkw3Y8ADR2V9s337huemiu4fZj9F+/YLtn2B0pzBkAMNR8nVOdA+FAd0DqtsHO9gz6lnwCXMca8uV/oLAc5iUexB4HgqnHlqTN1jemmxGqJHN+ssWFVcBPdQHW+3iYaAlIojeCS1JUPl+EU1eifeOuubfoagG598jRYsv6KWbK1oTbFGqzc7+eqGfFhT/Cu+GyrWsYPsH0IoUi8idLGEAAAAASUVORK5CYII="
                                            alt=""
                                            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 0;">
                                        <picture>
                                            <source srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                    /images/tintuc/{{ $tts->image1 }} 300w,
                                                                    /images/tintuc/{{ $tts->image1 }} 600w,
                                                                    /images/tintuc/{{ $tts->image1 }} 900w,
                                                                    /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                    /images/tintuc/{{ $tts->image1 }} 1280w"
                                                sizes="(max-width: 600px) 100vw, 600px">
                                            <img sizes="(max-width: 600px) 100vw, 600px"
                                                srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                                                        /images/tintuc/{{ $tts->image1 }} 300w,
                                                                                                        /images/tintuc/{{ $tts->image1 }} 600w,
                                                                                                        /images/tintuc/{{ $tts->image1 }} 900w,
                                                                                                        /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                                                        /images/tintuc/{{ $tts->image1 }} 1280w"
                                                src="/images/tintuc/{{ $tts->image1 }}" alt="" loading="lazy"
                                                style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 1; transition: none 0s ease 0s;">
                                        </picture><noscript>
                                            <picture>
                                                <source srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                    /images/tintuc/{{ $tts->image1 }} 300w,
                                                                    /images/tintuc/{{ $tts->image1 }} 600w,
                                                                    /images/tintuc/{{ $tts->image1 }} 900w,
                                                                    /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                    /images/tintuc/{{ $tts->image1 }} 1280w"
                                                    sizes="(max-width: 600px) 100vw, 600px" /><img loading="lazy"
                                                    sizes="(max-width: 600px) 100vw, 600px"
                                                    srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                                                                            /images/tintuc/{{ $tts->image1 }} 300w,
                                                                                                                            /images/tintuc/{{ $tts->image1 }} 600w,
                                                                                                                            /images/tintuc/{{ $tts->image1 }} 900w,
                                                                                                                            /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                                                                            /images/tintuc/{{ $tts->image1 }} 1280w"
                                                    src="/images/tintuc/{{ $tts->image1 }}" alt=""
                                                    style="position:absolute;top:0;left:0;opacity:1;width:100%;height:100%;object-fit:cover;object-position:center" />
                                            </picture>
                                        </noscript>
                                    </div>
                                    <div class="prose max-w-none pt-10 pb-8">
                                        <p>
                                            {{$tts->content2}}
                                        </p>
                                    </div>
                                @endif

                                @if ($tts->heading3 != null || $tts->content3 != null)
                                    {{-- heading3 --}}
                                    <div class="mb-8 rounded gatsby-image-wrapper"
                                        style="position: relative; overflow: hidden;">
                                        <div aria-hidden="true" style="width: 100%; padding-bottom: 56%;"></div><img
                                            aria-hidden="true"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAALCAYAAAB/Ca1DAAAACXBIWXMAAAsSAAALEgHS3X78AAABQElEQVQoz42T63KCMBCFqVYxCok6RMVLZwRxiuIFtUWnnfb9n+p0EwGh1eqPM5vMbr7k7ILB+AyZGtwvRF/Hhn1FaZ7l6wvDyGG2Kkij3ge0n6PJ/4pRrmGnFxfOlIBFcJOHkL0EzvAE4aSS2fpIStASYQl0E6hsWO0Y42kCHoR46i/x7EaoDlRcoeouwdwDeCe+D8ws8M4OrVECGX5DBB+ojdaoDVcwJzHqkw3Y8ADR2V9s337huemiu4fZj9F+/YLtn2B0pzBkAMNR8nVOdA+FAd0DqtsHO9gz6lnwCXMca8uV/oLAc5iUexB4HgqnHlqTN1jemmxGqJHN+ssWFVcBPdQHW+3iYaAlIojeCS1JUPl+EU1eifeOuubfoagG598jRYsv6KWbK1oTbFGqzc7+eqGfFhT/Cu+GyrWsYPsH0IoUi8idLGEAAAAASUVORK5CYII="
                                            alt=""
                                            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 0;">
                                        <picture>
                                            <source srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                            /images/tintuc/{{ $tts->image1 }} 300w,
                                                            /images/tintuc/{{ $tts->image1 }} 600w,
                                                            /images/tintuc/{{ $tts->image1 }} 900w,
                                                            /images/tintuc/{{ $tts->image1 }} 1200w,
                                                            /images/tintuc/{{ $tts->image1 }} 1280w"
                                                sizes="(max-width: 600px) 100vw, 600px">
                                            <img sizes="(max-width: 600px) 100vw, 600px"
                                                srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                                                /images/tintuc/{{ $tts->image1 }} 300w,
                                                                                                /images/tintuc/{{ $tts->image1 }} 600w,
                                                                                                /images/tintuc/{{ $tts->image1 }} 900w,
                                                                                                /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                                                /images/tintuc/{{ $tts->image1 }} 1280w"
                                                src="/images/tintuc/{{ $tts->image1 }}" alt="" loading="lazy"
                                                style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center; opacity: 1; transition: none 0s ease 0s;">
                                        </picture><noscript>
                                            <picture>
                                                <source srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                            /images/tintuc/{{ $tts->image1 }} 300w,
                                                            /images/tintuc/{{ $tts->image1 }} 600w,
                                                            /images/tintuc/{{ $tts->image1 }} 900w,
                                                            /images/tintuc/{{ $tts->image1 }} 1200w,
                                                            /images/tintuc/{{ $tts->image1 }} 1280w"
                                                    sizes="(max-width: 600px) 100vw, 600px" /><img loading="lazy"
                                                    sizes="(max-width: 600px) 100vw, 600px"
                                                    srcset="/images/tintuc/{{ $tts->image1 }} 150w,
                                                                                                                    /images/tintuc/{{ $tts->image1 }} 300w,
                                                                                                                    /images/tintuc/{{ $tts->image1 }} 600w,
                                                                                                                    /images/tintuc/{{ $tts->image1 }} 900w,
                                                                                                                    /images/tintuc/{{ $tts->image1 }} 1200w,
                                                                                                                    /images/tintuc/{{ $tts->image1 }} 1280w"
                                                    src="/images/tintuc/{{ $tts->image1 }}" alt=""
                                                    style="position:absolute;top:0;left:0;opacity:1;width:100%;height:100%;object-fit:cover;object-position:center" />
                                            </picture>
                                        </noscript>
                                    </div>
                                    <div class="prose max-w-none pt-10 pb-8">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sequitur disserendi
                                            ratio
                                            cognitioque
                                            naturae; Aliter enim nosmet ipsos nosse non possumus. Ut id aliis narrare
                                            gestiant?
                                            Nunc agendum est
                                            subtilius. Quae duo sunt, unum facit. Duo Reges: constructio interrete.</p>
                                        <ol>
                                            <li>Quid ei reliquisti, nisi te, quoquo modo loqueretur, intellegere, quid
                                                diceret?
                                            </li>
                                            <li>Itaque mihi non satis videmini considerare quod iter sit naturae quaeque
                                                progressio.</li>
                                            <li>Quod quidem iam fit etiam in Academia.</li>
                                        </ol>
                                        <blockquote>
                                            <p>Mihi, inquam, qui te id ipsum rogavi? Et quidem, inquit, vehementer errat; Si
                                                quicquam extra
                                                virtutem habeatur in bonis. Quis est tam dissimile homini.</p>
                                        </blockquote>
                                        <p><code>Alii rursum isdem a principiis omne officium referent aut ad voluptatem aut
                                                ad
                                                non dolendum aut
                                                ad prima illa secundum naturam optinenda.</code></p>
                                        <p>``</p>
                                        <ul>
                                            <li>Illud non continuo, ut aeque incontentae.</li>
                                            <li>Haec quo modo conveniant, non sane intellego.</li>
                                            <li>Age sane, inquam. Quae est igitur causa istarum angustiarum?</li>
                                            <li>Ut aliquid scire se gaudeant? Disserendi artem nullam habuit.</li>
                                            <li>Sed nimis multa. Haec dicuntur inconstantissime.</li>
                                        </ul>
                                    </div>
                                @endif

                                @if($tts->files != null)
                                    <div class="prose max-w-none pt-10 pb-8">
                                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-300">
                                            Download file:
                                        </h3>
                                        <br>
                                        @for ($i = 0; $i < count(json_decode($tts->files)); $i++)
                                            <a href="/files/{{ json_decode($tts->files)[$i] }}" target="_blank" class="text-gray-600 dark:text-gray-400">
                                                {{ json_decode($tts->files)[$i] }}
                                            </a><br>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                            <footer
                                class="text-sm font-medium leading-5 divide-y divide-gray-200 lg:col-start-1 lg:row-start-2">
                                <div class="space-y-8 py-8">
                                    @if ($nextpost != null)
                                        <div>
                                            <h2 class="text-xs tracking-wide uppercase text-gray-500">Next Post</h2>
                                            <div class="text-purple-500 hover:text-purple-600"><a
                                                    href="{{ route('tintuc.show', [$nextpost_id]) }}">{{ $nextpost->title }}</a>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($prevpost != null)
                                        <div>
                                            <h2 class="text-xs tracking-wide uppercase text-gray-500">Previous Post</h2>
                                            <div class="text-purple-500 hover:text-purple-600"><a
                                                    href="{{ route('tintuc.show', [$prevpost_id]) }}">{{ $prevpost->title }}</a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="pt-8"><a class="text-purple-500 hover:text-purple-600" href="/">← Trở
                                        về trang chủ</a>
                                </div>
                            </footer>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
