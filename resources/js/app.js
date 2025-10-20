import './bootstrap';
import 'preline';
// Import utilities
import './toast-utility.js';
import './login-page.js';
import './dashboard-page.js';
// Import icons
import { 
  createIcons, 
  BookOpen,
  GraduationCap,
  Award,
  Users,
  Mail,
  Lock,
  Eye,
  EyeOff,
  IdCard,
  KeySquare,
  IdCardLanyard,
  LayoutDashboard,
  Home,
  Settings,
  Calendar,
  Zap,
  FolderOpen,
  Menu,
  X,
  Bell,
  Activity,
  ChevronDown,
  Search,
  TrendingUp,
  TrendingDown,
  Plus,
  ChevronLeft,
  ChevronRight,
  Edit,
  LogOut,
  CirclePower,
  SwitchCamera,
  Languages,
  Earth,
  Check,
} from 'lucide';

// Pastikan DOM sudah siap
function initializeIcons() {
  const iconsUsed = {
    BookOpen,
    GraduationCap,
    Award,
    Users,
    Mail,
    Lock,
    Eye,
    EyeOff,
    IdCard,
    KeySquare,
    IdCardLanyard,
    LayoutDashboard,
    Home,
    Settings,
    Calendar,
    Zap,
    Calendar,
    FolderOpen,
    Menu,
    X,
    Bell,
    Activity,
    ChevronDown,
    Search,
    TrendingUp,
    TrendingDown,
    Plus,
    ChevronLeft,
    ChevronRight,
    Edit,
    LogOut,
    CirclePower,
    SwitchCamera,
    Languages,
    Earth,
    Check,
  };

  createIcons({ icons: iconsUsed });
}

// Inisialisasi setelah DOM ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initializeIcons);
} else {
  initializeIcons();
}

// Expose untuk penggunaan global
window.lucide = { createIcons };