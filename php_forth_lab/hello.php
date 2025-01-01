<?php echo '<td>
        <a href="view.php?id=' . htmlspecialchars($row["user_id"]) . '" class="btn btn-info btn-sm" title="View">
            <i class="bi bi-eye"></i>
        </a>
        <a href="edit.php?id=' . htmlspecialchars($row["user_id"]) . '" class="btn btn-warning btn-sm" title="Edit">
            <i class="bi bi-pencil-square"></i>
        </a>
        <a href="delete.php?id=' . htmlspecialchars($row["user_id"]) . '" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(\'Are you sure?\')">
            <i class="bi bi-trash"></i>
        </a>
      </td>';
?>