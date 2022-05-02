<ul id="list-nav" class="md:flex-col md:min-w-full flex flex-col list-none">
    @if (Auth::user()->role_id == '1')
    <li class="items-center">
        <a href="/khoa"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-boxes-stacked mr-2 text-sm opacity-75"></i>
            Khoa
        </a>
    </li>

    <li class="items-center">
        <a href="/giangvien"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-user-pen mr-2 text-sm opacity-75"></i>
            Giảng viên
        </a>
    </li>

    <li class="items-center">
        <a href="/phongthi"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-door-open  mr-2 text-sm opacity-75"></i>
            Phòng thi
        </a>
    </li>

    <li class="items-center">
        <a href="/monhoc"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-book  mr-2 text-sm opacity-75"></i>
            Môn học
        </a>
    </li>

    <li class="items-center">
        <a href="/buoithi"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fas fa-map-marked mr-2 text-sm text-blueGray-300"></i>
            Buổi thi
        </a>
    </li>

    <li class="items-center">
        <a href="/lichcoithi"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-calendar-check  mr-2 text-sm opacity-75"></i>
            Lịch coi thi
        </a>
    </li>

    <li class="items-center">
        <a href="/tinnhan"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-comment-sms mr-2 text-sm opacity-75"></i>
            Tin nhắn
        </a>
    </li>
    @elseif (Auth::user()->role_id == '2')
    <li class="items-center">
        <a href="/monhoc"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-book  mr-2 text-sm opacity-75"></i>
            Môn học
        </a>
    </li>

    <li class="items-center">
        <a href="/buoithi"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fas fa-map-marked mr-2 text-sm text-blueGray-300"></i>
            Buổi thi
        </a>
    </li>

    <li class="items-center">
        <a href="/lichcoithi"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-calendar-check  mr-2 text-sm opacity-75"></i>
            Lịch coi thi
        </a>
    </li>

    <li class="items-center">
        <a href="/tinnhan"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-comment-sms mr-2 text-sm opacity-75"></i>
            Tin nhắn
        </a>
    </li>
    @elseif (Auth::user()->role_id == '3')
    <li class="items-center">
        <a href="/lichcoithi"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-calendar-check  mr-2 text-sm opacity-75"></i>
            Lịch coi thi
        </a>
    </li>

    <li class="items-center">
        <a href="/tinnhan"
            class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
            <i class="fa-solid fa-comment-sms mr-2 text-sm opacity-75"></i>
            Tin nhắn
        </a>
    </li>
    @endif

</ul>
