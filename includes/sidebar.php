<?php
// includes/sidebar.php
// Sidebar component for all pages

// Get current user data if not already available
if (!isset($currentUser)) {
    $currentUser = getCurrentUser();
}

// Determine current page for active state
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!-- Responsive Sidebar for larger screens -->
<div class="sidebar bg-dark text-white d-none d-md-flex flex-column" style="width: 240px; min-height: 100vh;">
    <div class="p-3 border-bottom border-secondary">
        <h1 class="h5 mb-0 d-flex align-items-center gap-2">
            <i class="ri-cup-line"></i>
            <span>Cafe Manager</span>
        </h1>
    </div>
    
    <div class="py-3 flex-grow-1 overflow-auto">
        <div class="px-3 mb-2 text-uppercase text-white-50 small">
            Dashboard
        </div>
        
        <a href="<?php echo BASE_URL; ?>/index.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'index.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
            <i class="ri-dashboard-line me-2"></i>
            <span>Dashboard</span>
        </a>
        
        <a href="<?php echo BASE_URL; ?>/pages/orders.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'orders.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
            <i class="ri-shopping-basket-2-line me-2"></i>
            <span>Orders</span>
        </a>
        
        <a href="<?php echo BASE_URL; ?>/pages/menu-management.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'menu-management.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
            <i class="ri-restaurant-line me-2"></i>
            <span>Menu</span>
        </a>
        
        <?php if (isAdmin()): ?>
        <a href="<?php echo BASE_URL; ?>/pages/staff-management.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'staff-management.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
            <i class="ri-user-line me-2"></i>
            <span>Staff</span>
        </a>
        
        <a href="<?php echo BASE_URL; ?>/pages/reports.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'reports.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
            <i class="ri-file-chart-line me-2"></i>
            <span>Reports</span>
        </a>
        <?php endif; ?>
        
        <a href="<?php echo BASE_URL; ?>/pages/settings.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'settings.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
            <i class="ri-settings-4-line me-2"></i>
            <span>Settings</span>
        </a>
    </div>
    
    <div class="mt-auto p-3 border-top border-secondary">
        <div class="d-flex align-items-center">
            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                <?php 
                // Display user initials
                if($currentUser) {
                    $initials = '';
                    $nameParts = explode(' ', $currentUser['name']);
                    foreach($nameParts as $part) {
                        $initials .= substr($part, 0, 1);
                    }
                    echo htmlspecialchars(strtoupper($initials));
                }
                ?>
            </div>
            <div>
                <div class="small fw-medium"><?php echo htmlspecialchars($currentUser['name'] ?? ''); ?></div>
                <div class="small text-white-50 text-capitalize"><?php echo htmlspecialchars($currentUser['role'] ?? ''); ?></div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile sidebar (offcanvas) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header bg-dark text-white">
        <h5 class="offcanvas-title" id="sidebarLabel">
            <i class="ri-cup-line me-2"></i>
            Cafe Manager
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-dark text-white p-0">
        <div class="py-3">
            <div class="px-3 mb-2 text-uppercase text-white-50 small">
                Dashboard
            </div>
            
            <a href="<?php echo BASE_URL; ?>/index.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'index.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
                <i class="ri-dashboard-line me-2"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="<?php echo BASE_URL; ?>/pages/orders.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'orders.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
                <i class="ri-shopping-basket-2-line me-2"></i>
                <span>Orders</span>
            </a>
            
            <a href="<?php echo BASE_URL; ?>/pages/menu-management.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'menu-management.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
                <i class="ri-restaurant-line me-2"></i>
                <span>Menu</span>
            </a>
            
            <?php if (isAdmin()): ?>
            <a href="<?php echo BASE_URL; ?>/pages/staff-management.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'staff-management.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
                <i class="ri-user-line me-2"></i>
                <span>Staff</span>
            </a>
            
            <a href="<?php echo BASE_URL; ?>/pages/reports.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'reports.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
                <i class="ri-file-chart-line me-2"></i>
                <span>Reports</span>
            </a>
            <?php endif; ?>
            
            <a href="<?php echo BASE_URL; ?>/pages/settings.php" class="nav-link px-3 py-2 mb-1 <?php echo $currentPage == 'settings.php' ? 'active bg-primary-subtle text-white' : 'text-white-50'; ?>">
                <i class="ri-settings-4-line me-2"></i>
                <span>Settings</span>
            </a>
        </div>
        
        <div class="mt-auto p-3 border-top border-secondary">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                    <?php 
                    // Display user initials
                    if($currentUser) {
                        $initials = '';
                        $nameParts = explode(' ', $currentUser['name']);
                        foreach($nameParts as $part) {
                            $initials .= substr($part, 0, 1);
                        }
                        echo htmlspecialchars(strtoupper($initials));
                    }
                    ?>
                </div>
                <div>
                    <div class="small fw-medium"><?php echo htmlspecialchars($currentUser['name'] ?? ''); ?></div>
                    <div class="small text-white-50 text-capitalize"><?php echo htmlspecialchars($currentUser['role'] ?? ''); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>