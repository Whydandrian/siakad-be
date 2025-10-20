
<!-- Notification Dropdown -->
<div class="relative">
  <button
    id="notification-toggle"
    data-dropdown-toggle="notification-dropdown"
    class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 relative"
  >
    <i data-lucide="bell" class="h-5 w-5"></i>
    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
  </button>

  <!-- Notification Dropdown -->
  <div id="notification-dropdown"
    class="hidden fixed top-16 left-1/2 transform -translate-x-1/2 lg:left-auto lg:right-4 lg:transform-none mt-1 lg:w-80 w-80 max-w-[calc(100vw-2rem)] bg-white rounded-lg shadow-lg border border-gray-200 z-50">
    <!-- Header -->
    <div class="p-4 border-b border-gray-100">
      <div class="flex items-center justify-between">
        <h3 class="font-semibold text-lg text-gray-900">Notifications</h3>
        <div class="flex items-center gap-3">
          <span class="text-xs bg-red-500 text-white px-3 py-1 rounded-full font-medium">
            3 new
          </span>
        </div>
      </div>
    </div>

    <!-- Notifications List -->
    <div class="max-h-[384px] overflow-y-auto custom-scrollbar">
      <!-- Notification Item 1 -->
      <div class="p-4 hover:bg-gray-50 border-b border-gray-100 cursor-pointer transition-colors">
        <div class="flex items-start gap-4">
          <div class="flex-1 min-w-0 pr-4">
            <div class="flex items-start justify-between mb-1">
              <p class="text-sm font-semibold text-gray-900 leading-5">
                New student registered
              </p>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed mb-2 line-clamp-2">
              John Doe has registered for Computer Science program and is waiting for approval
            </p>
            <p class="text-xs text-gray-400 font-medium">2 minutes ago</p>
          </div>
        </div>
      </div>
      <div class="p-4 hover:bg-gray-50 border-b border-gray-100 cursor-pointer transition-colors">
        <div class="flex items-start gap-4">
          <div class="flex-1 min-w-0 pr-4">
            <div class="flex items-start justify-between mb-1">
              <p class="text-sm font-semibold text-gray-900 leading-5">
                New student registered
              </p>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed mb-2 line-clamp-2">
              John Doe has registered for Computer Science program and is waiting for approval
            </p>
            <p class="text-xs text-gray-400 font-medium">2 minutes ago</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="p-4 border-t border-gray-100 bg-gray-50 rounded-b-lg text-center">
      <a href="javascript:void(0)" class="w-full text-center text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors py-1"
        rel="noopener noreferrer">
        View all notifications
      </a>
    </div>
  </div>
</div>
