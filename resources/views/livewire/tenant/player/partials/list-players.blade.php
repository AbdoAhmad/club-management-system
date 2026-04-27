<div>
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Players Management</h1>
        <p class="page-subtitle">Manage your team's player roster and track their status</p>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="toolbar-search">
            <div class="input-with-icon">
                <input type="text" class="input-field" placeholder="Search players by name, position, or number..."
                    data-table-search>
                <span class="icon">🔍</span>
            </div>
        </div>
        <div class="toolbar-filters">
            <select class="input-field" style="width: 150px;" data-table-filter="status">
                <option value="">All Status</option>
                <option value="Active">Active</option>
                <option value="Injured">Injured</option>
                <option value="Banned">Banned</option>
            </select>
            <select class="input-field" style="width: 150px;" data-table-filter="position">
                <option value="">All Positions</option>
                <option value="Goalkeeper">Goalkeeper</option>
                <option value="Defender">Defender</option>
                <option value="Midfielder">Midfielder</option>
                <option value="Forward">Forward</option>
            </select>
        </div>
        <div class="toolbar-actions">
            <button class="btn btn-primary">
                <span>➕</span> Add Player
            </button>
        </div>
    </div>

    <!-- Table Wrapper -->
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th data-column="position">Position</th>
                    <th>Age</th>
                    <th>Jersey</th>
                    <th data-column="status">Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td>1</td>
                    <td><strong>Marcus Johnson</strong></td>
                    <td data-column="position">Goalkeeper</td>
                    <td>28</td>
                    <td>01</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Jan 15, 2022</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 2 -->
                <tr>
                    <td>2</td>
                    <td><strong>David Williams</strong></td>
                    <td data-column="position">Defender</td>
                    <td>25</td>
                    <td>04</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Mar 22, 2021</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 3 -->
                <tr>
                    <td>3</td>
                    <td><strong>Alex Smith</strong></td>
                    <td data-column="position">Defender</td>
                    <td>27</td>
                    <td>06</td>
                    <td><span class="badge badge-warning status-injured">Injured</span></td>
                    <td>Aug 10, 2020</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 4 -->
                <tr>
                    <td>4</td>
                    <td><strong>Carlos Rodriguez</strong></td>
                    <td data-column="position">Midfielder</td>
                    <td>24</td>
                    <td>08</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Jun 18, 2023</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 5 -->
                <tr>
                    <td>5</td>
                    <td><strong>James Miller</strong></td>
                    <td data-column="position">Midfielder</td>
                    <td>26</td>
                    <td>10</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Feb 05, 2022</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 6 -->
                <tr>
                    <td>6</td>
                    <td><strong>Ahmed Hassan</strong></td>
                    <td data-column="position">Forward</td>
                    <td>23</td>
                    <td>11</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Sep 14, 2023</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 7 -->
                <tr>
                    <td>7</td>
                    <td><strong>Luis Garcia</strong></td>
                    <td data-column="position">Forward</td>
                    <td>29</td>
                    <td>09</td>
                    <td><span class="badge badge-danger status-banned">Banned</span></td>
                    <td>Nov 30, 2021</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 8 -->
                <tr>
                    <td>8</td>
                    <td><strong>Thomas Brown</strong></td>
                    <td data-column="position">Midfielder</td>
                    <td>22</td>
                    <td>15</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Apr 08, 2023</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 9 -->
                <tr>
                    <td>9</td>
                    <td><strong>Emma Lewis</strong></td>
                    <td data-column="position">Forward</td>
                    <td>25</td>
                    <td>07</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Dec 20, 2022</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Row 10 -->
                <tr>
                    <td>10</td>
                    <td><strong>Ryan Taylor</strong></td>
                    <td data-column="position">Defender</td>
                    <td>30</td>
                    <td>16</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>May 12, 2020</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <!-- Additional rows for pagination -->
                <tr>
                    <td>11</td>
                    <td><strong>Kevin Anderson</strong></td>
                    <td data-column="position">Midfielder</td>
                    <td>21</td>
                    <td>12</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Jul 25, 2023</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>12</td>
                    <td><strong>Jessica White</strong></td>
                    <td data-column="position">Goalkeeper</td>
                    <td>26</td>
                    <td>02</td>
                    <td><span class="badge badge-warning status-injured">Injured</span></td>
                    <td>Oct 03, 2022</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>13</td>
                    <td><strong>Samuel Martinez</strong></td>
                    <td data-column="position">Forward</td>
                    <td>28</td>
                    <td>13</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Jan 19, 2023</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>14</td>
                    <td><strong>Nicole Davis</strong></td>
                    <td data-column="position">Defender</td>
                    <td>24</td>
                    <td>05</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Mar 11, 2023</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>15</td>
                    <td><strong>Patrick Johnson</strong></td>
                    <td data-column="position">Midfielder</td>
                    <td>27</td>
                    <td>14</td>
                    <td><span class="badge badge-success status-active">Active</span></td>
                    <td>Aug 27, 2022</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                            <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            <div class="pagination-info" data-pagination="info">Showing 1 to 10 of 15</div>
            <div class="pagination-controls">
                <button class="pagination-btn" data-pagination="prev">← Previous</button>
                <button class="pagination-btn" data-pagination="next">Next →</button>
            </div>
        </div>
    </div>
</div>
